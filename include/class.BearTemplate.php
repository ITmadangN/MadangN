<?php

namespace BearTemplate;

class BearTemplate
{
    public array  $Var;
    public array  $Loop;
    public array  $File;
    public string $Root;
    public bool   $debug;

    /**
     * 출력 모드 여부.
     * true  → echo 로 직접 화면 출력
     * false → $this->content 에 결과를 누적 저장
     */
    private bool   $outputMode;

    /**
     * 버퍼 저장 모드일 때 결과가 누적되는 프로퍼티.
     * tprint() 호출 후 이 변수에서 최종 결과를 가져올 수 있습니다.
     */
    public string $content = '';

    /**
     * @param string $root       템플릿 파일의 루트 경로
     * @param bool   $outputMode true = 화면 출력, false = $this->content 에 저장
     */
    public function __construct(string $root = '', bool $outputMode = true)
    {
        $this->Var        = $_REQUEST;
        $this->Loop       = [];
        $this->File       = [];
        $this->Root       = preg_replace('/[\/]+$/', '', $root);
        $this->debug      = false;
        $this->outputMode = $outputMode;
        $this->content    = '';
    }

    /** 디버그 모드 활성화 */
    public function setDebug(): void
    {
        $this->debug = true;
    }

    /**
     * 파일을 정의하는 함수
     *
     * @param string|array $name 파일 별칭 또는 [별칭 => 경로] 배열
     * @param string       $file 파일 경로 ($name 이 문자열일 때)
     */
    public function define(string|array $name, string $file = ''): void
    {
        if (is_array($name) && $file === '') {
            foreach ($name as $n => $v) {
                $this->define($n, $v);
            }
        } else {
            $this->File[$name] = $file;
        }
    }

    /**
     * 변수를 지정하는 함수
     *
     * @param string|array $name  변수명 또는 [변수명 => 값] 배열
     * @param mixed        $value 값 ($name 이 문자열일 때)
     */
    public function assign(string|array $name, mixed $value = ''): void
    {
        if (is_array($name) && $value === '') {
            foreach ($name as $n => $v) {
                $this->assign($n, $v);
            }
            return;
        }

        switch (gettype($value)) {
            case 'array':
                if (isset($value[0]) && is_array($value[0])) {
                    $this->Loop[$name] = $value;
                    $this->Var[$name]  = true;
                    break;
                }
            // fall-through intentional
            case 'object':
                foreach ($value as $n => $v) {
                    if (is_array($v)) {
                        $this->assign($n, $v);
                    } else {
                        $this->assign($name . '.' . $n, $v);
                    }
                }
                break;
            default:
                $this->Var[$name] = $value;
        }
    }

    /**
     * 파싱 함수 (구버전 호환용, 실제 처리는 tprint/fetch 에서 수행)
     */
    public function parse(string $name, bool $loop = false): void
    {
        // 하위 호환성 유지용 스텁
    }

    /**
     * 결과를 문자열로 반환 (화면 출력 없음)
     */
    public function fetch(string $name): string
    {
        ob_start();
        // fetch 는 항상 버퍼를 캡처해야 하므로 임시로 출력 모드를 끔
        $prev = $this->outputMode;
        $this->outputMode = true; // 내부에서 echo 를 쓰게 한 뒤 ob 로 캡처
        $this->tprint($name);
        $this->outputMode = $prev;
        $buffer = ob_get_clean();
        return $buffer !== false ? $buffer : '';
    }

    /**
     * 출력 또는 저장
     *
     * 출력 모드(outputMode=true) : 화면에 직접 출력
     * 저장 모드(outputMode=false): $this->content 에 결과를 누적
     */
    public function tprint(string $name = ''): void
    {
        if ($name === '') {
            return;
        }
        $file = isset($this->File[$name]) ? $this->File[$name] : $name;

        if ($this->outputMode) {
            // 출력 모드: 그대로 echo
            $this->_parseTag($this->_readFile($file));
        } else {
            // 저장 모드: ob 로 캡처 후 $this->content 에 누적
            ob_start();
            $this->_parseTag($this->_readFile($file));
            $chunk = ob_get_clean();
            if ($chunk !== false) {
                $this->content .= $chunk;
            }
        }
    }

    // ── 별칭 메서드들 ─────────────────────────────────────────

    /** define() 의 다른 이름 */
    public function setFile(string $name, string $file): void
    {
        $this->define($name, $file);
    }

    /** assign() 의 다른 이름 */
    public function setVar(string|array $name, mixed $value = ''): void
    {
        $this->assign($name, $value);
    }

    /** 루프 변수 지정 함수 */
    public function setLoop(string $name, array $value): void
    {
        if (!empty($value)) {
            $this->Loop[$name] = $value;
            $this->Var[$name]  = true;
        }
    }

    // ── 내부 함수들 ───────────────────────────────────────────

    /** 파일 읽기 (내부 함수) */
    private function _readFile(string $path): string|false
    {
        if ($this->Root !== '' && is_file($this->Root . '/' . $path)) {
            $path = $this->Root . '/' . $path;            
        }        
        if (!@is_readable($path)) {            
            return $this->setError("$path is not readable");
        }
        $content = @file_get_contents($path);
        if ($content === false) {
            return $this->setError("$path is not opened");
        }
        return $content;
    }

    /** URL 읽기 (내부 함수) */
    private function _readURL(string $url): string|false
    {
        $r = parse_url($url);
        if (!isset($r['host'])) {
            $r['host'] = $_SERVER['HTTP_HOST'] ?? 'localhost';
        }
        if (!isset($r['port'])) {
            $r['port'] = 80;
        }
        $path = isset($r['query']) ? $r['path'] . '?' . $r['query'] : ($r['path'] ?? '/');
        $fp   = @fsockopen($r['host'], $r['port'], $errno, $errstr, 30);
        if (!$fp) {
            return $this->setError("$url is not connected");
        }
        fwrite($fp, "GET $path HTTP/1.0\r\nHost: {$r['host']}\r\n\r\n");
        $body   = false;
        $buffer = '';
        while (!feof($fp)) {
            $s = fgets($fp, 1024);
            if ($body) {
                $buffer .= $s;
            } elseif ($s === "\r\n") {
                $body = true;
            }
        }
        fclose($fp);
        return $buffer;
    }

    /** PHP 파일 실행 (내부 함수) */
    private function _exePHP(string $path): void
    {
        $var_arr  = explode('?', $path);
        if (isset($var_arr[1])) {
            parse_str($var_arr[1], $parsed);
            extract($parsed, EXTR_SKIP);
        }
        $filename = $var_arr[0];
        if (!is_readable($filename)) {
            $this->setError("$filename is not readable");
            return;
        }
        include_once $filename;
    }

    /** 소스코드 실행 (내부 함수) */
    private function _exeCode(string $code): void
    {
        if (!str_ends_with($code, ';')) {
            $code .= ';';
        }
        eval(str_replace('>>', 'echo ', $code));
    }

    /** 커맨드 파싱 (내부 함수) */
    private function _parseCmd(string $str): array
    {
        $arr = explode(' ', $str);
        if (in_array($arr[0], ['INCLUDE', 'EXECUTE', 'LOOP', 'IF', 'IFNOT'], true)) {
            if (isset($arr[2])) {
                $arr[2] = $this->_parseVar(substr($arr[2], 1, -1), false);
            }
        } else {
            echo "<!-- $str -->";
        }
        return $arr;
    }

    /**
     * 변수 치환 (내부 함수)
     *
     * @param string $buffer 파싱할 문자열
     * @param bool   $print  true = echo 출력, false = 문자열 반환
     */
    private function _parseVar(string $buffer, bool $print = true): string
    {
        $arr1 = explode('{{', $buffer);
        $str  = $arr1[0];
        $max  = count($arr1);
        for ($i = 1; $i < $max; $i++) {
            $arr2 = explode('}}', $arr1[$i]);
            if (preg_match('/^[^ ]+$/i', $arr2[0])) {
                $after = substr($arr1[$i], strlen($arr2[0]) + 2);
                $str  .= ($this->Var[$arr2[0]] ?? '') . $after;
            } else {
                $str .= '{{' . $arr1[$i];
            }
        }
        if ($print) {
            echo $str;
            return '';
        }
        return $str;
    }

    /** 루프 파싱 (내부 함수) */
    private function _parseLoop(string $name, string $buffer): void
    {
        if (is_array($this->Loop[$name])) {
            foreach ($this->Loop[$name] as $row) {
                $this->assign($name, $row);
                $this->_parseTag($buffer);
            }
        } elseif (is_object($this->Loop[$name])) {
            while (!$this->Loop[$name]->EOF) {
                $this->assign($name, $this->Loop[$name]->fields);
                $this->_parseTag($buffer);
                $this->Loop[$name]->MoveNext();
            }
        }
    }

    /** 템플릿 태그 스캐닝 및 처리 (내부 함수) */
    private function _parseTag(string|false $buffer): void
    {
        if ($buffer === false) {
            return;
        }
        $offset = 0;
        while (is_int($pos = strpos($buffer, '<!-- ', $offset))) {
            $this->_parseVar(substr($buffer, $offset, $pos - $offset));
            $offset = $pos + 5;

            // PHP 8.1 에서 $str{n} 문법 제거 → $str[$n] 사용
            $char = ($buffer[$pos + 5] ?? '') . ($buffer[$pos + 6] ?? '');

            if (
                in_array($char, ['IN', 'IF', 'LO', 'EX'], true) &&
                is_int($endpos = strpos($buffer, ' -->', $offset))
            ) {
                $offset = $endpos + 4;
                if ($endpos - $pos > 100) {
                    echo substr($buffer, $pos, $endpos - $pos + 4);
                    continue;
                }
                $arr = $this->_parseCmd(substr($buffer, $pos + 5, $endpos - $pos - 5));

                switch ($arr[0]) {
                    case 'INCLUDE':
                        if ($arr[1] === 'FILE') {
                            $this->_parseTag($this->_readFile($arr[2]));
                        } elseif ($arr[1] === 'URL') {
                            $this->_parseTag($this->_readURL($arr[2]));
                        } elseif ($arr[1] === 'NAME') {
                            if (isset($this->File[$arr[2]])) {
                                $this->_parseTag($this->_readFile($this->File[$arr[2]]));
                            } else {
                                $this->setError("INCLUDE NAME '{$arr[2]}' is not defined");
                            }
                        }
                        break;

                    case 'EXECUTE':
                        if ($arr[1] === 'FILE') {
                            $this->_exePHP($arr[2]);
                        } elseif ($arr[1] === 'CODE') {
                            $this->_exeCode($arr[2]);
                        }
                        break;

                    case 'LOOP':
                        if ($arr[1] === 'START') {
                            $next = "<!-- LOOP END '{$arr[2]}' -->";
                            if (is_int($endpos = strpos($buffer, $next, $offset))) {
                                if (isset($this->Loop[$arr[2]]) && !empty($this->Loop[$arr[2]])) {
                                    $this->_parseLoop($arr[2], substr($buffer, $offset, $endpos - $offset));
                                }
                                $offset = $endpos + strlen($next);
                            } else {
                                $this->setError("LOOP END '{$arr[2]}' not exists");
                            }
                        }
                        break;

                    case 'IF':
                        if ($arr[1] === 'START' && (!isset($this->Var[$arr[2]]) || empty($this->Var[$arr[2]]))) {
                            $next = "<!-- IF END '{$arr[2]}' -->";
                            if (is_int($endpos = strpos($buffer, $next, $offset))) {
                                $offset = $endpos + strlen($next);
                            } else {
                                $this->setError("IF END '{$arr[2]}' not exists");
                            }
                        }
                        break;

                    case 'IFNOT':
                        if ($arr[1] === 'START' && isset($this->Var[$arr[2]]) && !empty($this->Var[$arr[2]])) {
                            $next = "<!-- IFNOT END '{$arr[2]}' -->";
                            if (is_int($endpos = strpos($buffer, $next, $offset))) {
                                $offset = $endpos + strlen($next);
                            } else {
                                $this->setError("IFNOT END '{$arr[2]}' not exists");
                            }
                        }
                        break;
                }
            } else {
                echo '<!-- ';
            }
        }
        $this->_parseVar(substr($buffer, $offset));
    }

    /** 내부 상태 초기화 */
    public function clear(): void
    {
        $this->Var     = [];
        $this->Loop    = [];
        $this->File    = [];
        $this->content = '';
    }

    /**
     * 에러 처리
     *
     * @return false 항상 false 반환 (에러 표시 후 계속 진행)
     */
    public function setError(string $msg): bool
    {
        if ($this->debug) {
            echo "<b>Template Error:</b> $msg <br>\r\n";
        }
        return false;
    }
}
