<?php

// 이미지 내용 리턴

$c = $_GET['c'];        // 메뉴명
$cc = $_GET['cc'];      // 업로드 디렉토리
$d = $_GET['d'];        // 파일 매칭
$s = $_GET['s'];        // id

$file = $_SERVER['DOCUMENT_ROOT']."/../UPLOADS/".$cc."_files/".$cc."_".$s."_".$d;

function getExtensionFromMime(string $mimeType): string {
    return match ($mimeType) {
        'image/jpeg' => 'jpg',
        'image/png'  => 'png',
        'image/gif'  => 'gif',
        'image/webp' => 'webp',
        'image/svg+xml' => 'svg',
        'image/avif' => 'avif',
        'image/bmp'  => 'bmp',
        'image/x-icon', 'image/vnd.microsoft.icon' => 'ico',
        default => 'bin' // 알 수 없는 타입의 기본 확장자
    };
}

if (file_exists($file)) {    
    
    $mime = mime_content_type($file);
    
    $ext = getExtensionFromMime($mime);
    $filename = basename($file) . "." . $ext;
    
    header("Content-Type: {$mime}");
    header("Content-Length: " . filesize($file));
    header("Content-Disposition: inline; filename=\"{$filename}\"");

    readfile($file);
}
else {
    
    $filename = "blank.png";
    
    $file = "./blank.png";
    
    header("Content-Type: image/png");
    header("Content-Length: " . filesize($file));
    header("Content-Disposition: inline; filename=\"{$filename}\"");

    readfile($file);
}