<?php
/************************************************************************
HopegiverPHP - Web Application Development Framework for PHP

Copyright (C) 2007 MalgnSoft, Inc.
Modified for PHP 8.1 compatibility.
 ************************************************************************/

class BearTemplate {

    public array $Var;
    public array $Loop;
    public array $File;
    public string $Root;
    public bool $debug;
    protected string $_top = ""; // 기본값 설정

    private string $print_method = "print";

    private string $content = "";

    // PHP 8.1 스타일 생성자
    public function __construct(string $print_method="print", string $root = "") {
        // $_REQUEST 참조는 현대적 방식에서는 가급적 피하고 명시적 할당을 권장하지만,
        // 기존 로직 유지를 위해 유지합니다.
        $this->Var = $_REQUEST;
        $this->Loop = [];
        $this->File = [];
        $this->Root = preg_replace("/[\/]+$/", "", $root);
        $this->debug = false;
        $this->print_method = $print_method;
    }

    public function setDebug(): void {
        $this->debug = true;
    }

    # 파일을 정의하는 함수
    public function define(string|array $name, string $file = ""): void {
        if (is_array($name) && $file == "") {
            foreach ($name as $n => $v) $this->define($n, $v);
        } else {
            $this->File[$name] = $file;
        }
    }

    # 변수를 지정하는 함수
    public function assign(string|array $name, mixed $value = ""): void {
        if (is_array($name) && $value == "") {
            foreach ($name as $n => $v) $this->assign($n, $v);
        } else {
            switch (gettype($value)) {
                case 'array':
                    if (isset($value[0]) && is_array($value[0])) {
                        $this->Loop[$name] = $value;
                        $this->Var[$name] = true;
                        break;
                    }
                // break 없이 계속 진행 (fall-through)
                case 'object':
                    foreach ($value as $n => $v) {
                        if (is_array($v)) $this->assign($n, $v);
                        else $this->assign($name . "." . $n, $v);
                    }
                    break;
                default:
                    $this->Var[$name] = $value;
            }
        }
    }

    # 파싱함수 (구현부 필요시 로직 추가)
    public function parse(string $name, bool $loop = false): void {
    }

    # 불러오기
    public function fetch(string $name): string {
        ob_start();
        $this->tprint($name);
        $buffer = ob_get_contents();
        ob_end_clean();
        return (string)$buffer;
    }

    # 출력하기
    public function tprint(string $name = ""): string {
        if ($name == "") $name = $this->_top;
        $file = isset($this->File[$name]) ? $this->File[$name] : $name;
        $this->_parseTag($this->_readFile($file));

        return $this->content;
    }

    # 파일 지정 함수
    public function setFile(string $name, string $file): void {
        $this->define($name, $file);
    }

    # 변수 지정 함수
    public function setVar(string|array $name, mixed $value = ""): void {
        $this->assign($name, $value);
    }

    # 루프 변수 지정 함수
    public function setLoop(string $name, mixed $value): void {
        if (!empty($value) && is_array($value)) {
            $this->Loop[$name] = $value;
            $this->Var[$name] = true;
        }
    }

    # 파일읽기(내부함수)
    protected function _readFile(string $path): string {
        if ($this->Root != "" && is_file($this->Root . "/" . $path)) $path = $this->Root . "/" . $path;
        if (!@is_readable($path)) return (string)$this->setError("$path is not readable");

        $content = @file_get_contents($path);
        if ($content === false) return (string)$this->setError("$path is not opened");
        return $content;
    }

    # URL읽기(내부함수)
    protected function _readURL(string $url): string {
        $r = parse_url($url);
        if (!isset($r['host'])) $r['host'] = $_SERVER['HTTP_HOST'] ?? 'localhost';
        if (!isset($r['port'])) $r['port'] = 80;
        $path = isset($r['query']) ? ($r['path'] ?? '/') . "?" . $r['query'] : ($r['path'] ?? '/');

        $fp = @fsockopen($r['host'], $r['port'], $errno, $errstr, 30);
        if (!$fp) {
            return (string)$this->setError("$url is not connected");
        }

        fwrite($fp, "GET $path HTTP/1.0\r\nHost: {$r['host']}\r\n\r\n");
        $body = false;
        $buffer = "";
        while (!feof($fp)) {
            $s = fgets($fp, 1024);
            if ($body == true) $buffer .= $s;
            else if ($s == "\r\n") $body = true;
        }
        fclose($fp);
        return $buffer;
    }

    # PHP실행 (내부함수)
    protected function _exePHP(string $path): void {
        global $SS_LEVEL;
        $var_arr = explode("?", $path);
        if (isset($var_arr[1])) parse_str($var_arr[1], $output_vars); // PHP 8.1은 두번째 인자 권장

        $filename = $var_arr[0];
        if (!is_readable($filename)) {
            $this->setError("$filename is not readable");
            return;
        }
        include_once($filename);
    }

    # 소스코드실행 (내부함수)
    protected function _exeCode(string $code): void {
        if (str_ends_with(trim($code), ";") === false) $code .= ";";
        // eval은 보안상 위험하므로 주의가 필요합니다.
        eval(str_replace(">>", "echo ", $code));
    }

    protected function _parseCmd(string $str): array {
        $arr = explode(" ", $str);
        if (in_array($arr[0], ["INCLUDE", "EXECUTE", "LOOP", "IF", "IFNOT"])) {
            if (isset($arr[2])) {
                $arr[2] = $this->_parseVar(substr($arr[2], 1, -1));
            }
        } else {
            if($this->print_method == "print") echo "<!-- $str -->";
            else $this->content .= "<!-- $str -->";
        }
        return $arr;
    }

    # 문자를 파싱 (내부함수)
    protected function _parseVar(string $buffer): ?string {
        $arr1 = explode("{{", $buffer);
        $str = $arr1[0];
        for ($i = 1, $max = count($arr1); $i < $max; $i++) {
            $arr2 = explode("}}", $arr1[$i]);
            if (preg_match("/^[^ ]+$/i", $arr2[0])) {
                if (isset($this->Var[$arr2[0]])) {
                    $str .= $this->Var[$arr2[0]] . substr($arr1[$i], strlen($arr2[0]) + 2);
                } else {
                    $str .= substr($arr1[$i], strlen($arr2[0]) + 2);
                }
            } else {
                $str .= "{{" . $arr1[$i];
            }
        }
        if ($this->print_method == "print") {
            echo $str;
            return "";
        }
        else {
            $this->content .= $str;
            return $str;
        }
    }

    # 루프 파싱 (내부함수)
    protected function _parseLoop(string $name, string &$buffer): void {
        if (isset($this->Loop[$name]) && is_array($this->Loop[$name])) {
            foreach ($this->Loop[$name] as $row) {
                $this->assign($name, $row);
                $this->_parseTag($buffer);
            }
        } elseif (isset($this->Loop[$name]) && is_object($this->Loop[$name])) {
            // 구형 DB 객체 대응 (EOF, MoveNext 등)
            while (!$this->Loop[$name]->EOF) {
                $this->assign($name, $this->Loop[$name]->fields);
                $this->_parseTag($buffer);
                $this->Loop[$name]->MoveNext();
            }
        }
    }

    # 템플릿 태그 스캐닝 (내부함수)
    protected function _parseTag(string $buffer): void {
        $offset = 0;
        while (($pos = strpos($buffer, "<!-- ", $offset)) !== false) {
            $this->_parseVar(substr($buffer, $offset, $pos - $offset));
            $this->content .= $this->_parseVar(substr($buffer, $offset, $pos - $offset));
            $offset = $pos + 5;

            // PHP 8.1에서 $buffer{} 대신 $buffer[] 사용
            $char = ($buffer[$pos + 5] ?? '') . ($buffer[$pos + 6] ?? '');

            if (($char == "IN" || $char == "IF" || $char == "LO" || $char == "EX") &&
                ($endpos = strpos($buffer, " -->", $offset)) !== false) {

                $raw_cmd = substr($buffer, $pos + 5, $endpos - $pos - 5);
                $arr = $this->_parseCmd($raw_cmd);
                $offset = $endpos + 4;

                if ($endpos - $pos > 100) {
                    if($this->print_method == "print") echo substr($buffer, $pos, $endpos - $pos + 4);
                    else $this->content .= substr($buffer, $pos, $endpos - $pos + 4);
                    continue;
                }

                switch ($arr[0]) {
                    case 'INCLUDE':
                        if ($arr[1] == "FILE") $this->_parseTag($this->_readFile($arr[2]));
                        else if ($arr[1] == "URL") $this->_parseTag($this->_readURL($arr[2]));
                        else if ($arr[1] == "NAME") {
                            if (isset($this->File[$arr[2]])) {
                                $this->_parseTag($this->_readFile($this->File[$arr[2]]));
                            } else {
                                $this->setError("INCLUDE NAME '{$arr[2]}' is not defined");
                            }
                        }
                        break;
                    case 'EXECUTE':
                        if ($arr[1] == "FILE") $this->_exePHP($arr[2]);
                        else if ($arr[1] == "CODE") $this->_exeCode($arr[2]);
                        break;
                    case 'LOOP':
                        if ($arr[1] == "START") {
                            $next = "<!-- LOOP END '" . $arr[2] . "' -->";
                            if (($loop_end_pos = strpos($buffer, $next, $offset)) !== false) {
                                if (isset($this->Loop[$arr[2]]) && !empty($this->Loop[$arr[2]])) {
                                    $loop_content = substr($buffer, $offset, $loop_end_pos - $offset);
                                    $this->_parseLoop($arr[2], $loop_content);
                                }
                                $offset = $loop_end_pos + strlen($next);
                            } else {
                                $this->setError("LOOP END '{$arr[2]}' not exists");
                            }
                        }
                        break;
                    case 'IF':
                        if ($arr[1] == "START" && (!isset($this->Var[$arr[2]]) || empty($this->Var[$arr[2]]))) {
                            $next = "<!-- IF END '" . $arr[2] . "' -->";
                            if (($if_end_pos = strpos($buffer, $next, $offset)) !== false) {
                                $offset = $if_end_pos + strlen($next);
                            } else {
                                $this->setError("IF END '{$arr[2]}' not exists");
                            }
                        }
                        break;
                    case 'IFNOT':
                        if ($arr[1] == "START" && (isset($this->Var[$arr[2]]) && !empty($this->Var[$arr[2]]))) {
                            $next = "<!-- IFNOT END '" . $arr[2] . "' -->";
                            if (($ifnot_end_pos = strpos($buffer, $next, $offset)) !== false) {
                                $offset = $ifnot_end_pos + strlen($next);
                            } else {
                                $this->setError("IFNOT END '{$arr[2]}' not exists");
                            }
                        }
                        break;
                }
            } else {
                if($this->print_method == "print") echo "<!-- ";
                else $this->content .= "<!-- ";
            }
        }
        $this->_parseVar(substr($buffer, $offset));
        $this->content .= $this->_parseVar(substr($buffer, $offset));
    }

    public function clear(): void {
        $this->Var = [];
        $this->Loop = [];
        $this->File = [];
    }

    public function setError(string $msg): bool {
        if ($this->debug) echo "<b>Template Error:</b> $msg <br>\r\n";
        return false;
    }
}
