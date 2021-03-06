<?php

function AmbilFoto($foto){
  $file_foto = base_url() . LOKASI_USER_PICT . "/kecil_" . $foto;
  return $file_foto;
}

function UploadFoto($fupload_name,$old_foto){
  $vdir_upload = LOKASI_USER_PICT;
  if($old_foto!="")
	unlink($vdir_upload."kecil_".$old_foto);

  $vfile_upload = $vdir_upload . $fupload_name;
  move_uploaded_file($_FILES["foto"]["tmp_name"], $vfile_upload);
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  if($src_width < $src_height){
	  $dst_width = 100;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	  $cut_height = ($dst_height - 100)/2;
	  $im = imagecreatetruecolor(100,100);
	  imagecopyresampled($im, $im_src, 0, -($cut_height), 0, $cut_height, $dst_width, $dst_height, $src_width, $src_height);

  }else{
	  $dst_height = 100;
	  $dst_width = ($dst_height/$src_height)*$src_width;
	  $cut_width = ($dst_width - 100)/2;
	  $im = imagecreatetruecolor(100,100);
	  imagecopyresampled($im, $im_src, -($cut_width), 0, $cut_width, 0, $dst_width, $dst_height, $src_width, $src_height);
  }
  imagejpeg($im,$vdir_upload ."kecil_".$fupload_name);
  imagedestroy($im_src);
  imagedestroy($im);

  unlink($vfile_upload);
  return true;
}

function UploadGambar($fupload_name,$old_gambar){
  $vdir_upload = "assets/front/slide/";
  if($old_gambar!="")
	unlink($vdir_upload."kecil_".$old_gambar);

  $vfile_upload = $vdir_upload . $fupload_name;

  move_uploaded_file($_FILES["gambar"]["tmp_name"], $vfile_upload);

  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  if(($src_width * 25) < ($src_height * 44)){
	  $dst_width = 440;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	  $cut_height = $dst_height - 250;

	  $im = imagecreatetruecolor(440,250);
	  imagecopyresampled($im, $im_src, 0, 0, 0, $cut_height, $dst_width, $dst_height, $src_width, $src_height);

  }else{
	  $dst_height = 250;
	  $dst_width = ($dst_height/$src_height)*$src_width;
	  $cut_width = $dst_width - 440;

	  $im = imagecreatetruecolor(440,250);
	  imagecopyresampled($im, $im_src, 0, 0, $cut_width, 0, $dst_width, $dst_height, $src_width, $src_height);
  }
  imagejpeg($im,$vdir_upload ."kecil_".$fupload_name);

  imagedestroy($im_src);
  imagedestroy($im);

  unlink($vfile_upload);
  return true;
}

function AmbilGaleri($foto, $ukuran){
  $file_foto = base_url() . LOKASI_GALERI . $ukuran ."_" . $foto;
  return $file_foto;
}

function UploadGallery($fupload_name){
  $vdir_upload = LOKASI_GALERI;
  //if($old_gambar!=""){
//	unlink($vdir_upload."kecil_".$old_gambar);
//	unlink($vdir_upload.$old_gambar);
 // }
  $vfile_upload = $vdir_upload . $fupload_name;
  move_uploaded_file($_FILES["gambar"]["tmp_name"], $vfile_upload);

  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  if($src_width > $src_height){
	  $dst_width = 440;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	  $cut_height = $dst_height - 300;

	  $im = imagecreatetruecolor(440,$dst_height );
	  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  }else{
	  $dst_height = 440;
	  $dst_width = ($dst_height/$src_height)*$src_width;
	  $cut_width = $dst_width - 440;

	  $im = imagecreatetruecolor($dst_width,440);
	  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
  }
  imagejpeg($im,$vdir_upload ."kecil_".$fupload_name);

//  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  if($src_width > $src_height){
	  $dst_width = 880;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	  $cut_height = $dst_height - 600;

	  $im = imagecreatetruecolor(880,$dst_height);
	  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  }else{
	  $dst_height = 880;
	  $dst_width = ($dst_height/$src_height)*$src_width;
	  $cut_width = $dst_width - 880;

	  $im = imagecreatetruecolor($dst_width,880);
	  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
  }
  imagejpeg($im,$vdir_upload ."sedang_".$fupload_name);

  imagedestroy($im_src);
  imagedestroy($im);

  unlink($vfile_upload);
  return true;
}

function UploadSimbolx($fupload_name,$old_gambar){
  $vdir_upload = "assets/gis/simbol";
  if($old_gambar!=""){
	unlink($vdir_upload."kecil_".$old_gambar);
	unlink($vdir_upload.$old_gambar);
  }
  $vfile_upload = $vdir_upload . $fupload_name;

  move_uploaded_file($_FILES["gambar"]["tmp_name"], $vfile_upload);

  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  if(($src_width * 20) < ($src_height * 44)){
	  $dst_width = 440;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	  $cut_height = $dst_height - 300;

	  $im = imagecreatetruecolor(440,300);
	  imagecopyresampled($im, $im_src, 0, 0, 0, $cut_height, $dst_width, $dst_height, $src_width, $src_height);

  }else{
	  $dst_height = 300;
	  $dst_width = ($dst_height/$src_height)*$src_width;
	  $cut_width = $dst_width - 440;

	  $im = imagecreatetruecolor(440,300);
	  imagecopyresampled($im, $im_src, 0, 0, $cut_width, 0, $dst_width, $dst_height, $src_width, $src_height);
  }
  imagejpeg($im,$vdir_upload ."kecil_".$fupload_name);

  imagedestroy($im_src);
  imagedestroy($im);

  //unlink($vfile_upload);
  return true;
}

function AmbilFotoArtikel($foto, $ukuran){
  $file_foto = base_url() . LOKASI_FOTO_ARTIKEL . $ukuran ."_" . $foto;
  return $file_foto;
}

function UploadArtikel($fupload_name,$gambar,$fp){
  $vdir_upload = LOKASI_FOTO_ARTIKEL;
  //if($old_gambar!=""){
	//unlink($vdir_upload."kecil_".$old_gambar);
	//unlink($vdir_upload.$old_gambar);
  //}
  $vfile_upload = $vdir_upload . $fupload_name;

  move_uploaded_file($_FILES["$gambar"]["tmp_name"], $vfile_upload);

  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  if($src_width > $src_height){
	  $dst_width = 440;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	  $cut_height = $dst_height - 300;

	  $im = imagecreatetruecolor(440,$dst_height);
	  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  }else{
	  $dst_height = 440;
	  $dst_width = ($dst_height/$src_height)*$src_width;
	  $cut_width = $dst_width - 440;

	  $im = imagecreatetruecolor($dst_width,440);
	  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
  }
  imagejpeg($im,$vdir_upload ."kecil_".$fp.$fupload_name);

  imagedestroy($im_src);
  imagedestroy($im);


  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  if($src_width > $src_height){
	  $dst_width = 880;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	  $cut_height = $dst_height - 600;

	  $im = imagecreatetruecolor(880,$dst_height);
	  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);

  }else{
	  $dst_height = 880;
	  $dst_width = ($dst_height/$src_height)*$src_width;
	  $cut_width = $dst_width - 880;

	  $im = imagecreatetruecolor($dst_width,880);
	  imagecopyresampled($im, $im_src, 0, 0, 0, 0, $dst_width, $dst_height, $src_width, $src_height);
  }
  imagejpeg($im,$vdir_upload ."sedang_".$fp.$fupload_name);

  imagedestroy($im_src);
  imagedestroy($im);


  unlink($vfile_upload);
  return true;
}

function HapusArtikel($gambar){
  $vdir_upload = LOKASI_FOTO_ARTIKEL;
  $vfile_upload = $vdir_upload . "sedang_" . $gambar;
  unlink($vfile_upload);
  $vfile_upload = $vdir_upload . "kecil_" . $gambar;
  unlink($vfile_upload);
  return true;
}

function UploadLokasi($fupload_name){
  $vdir_upload = LOKASI_FOTO_LOKASI;

  $vfile_upload = $vdir_upload . $fupload_name;

  move_uploaded_file($_FILES["foto"]["tmp_name"], $vfile_upload);

  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  if(($src_width / $src_height) < (12 / 10)){
	  $dst_width = 120;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	  $cut_height = $dst_height - 100;

	  $im = imagecreatetruecolor(120,100);
	  imagecopyresampled($im, $im_src, 0, 0, 0, $cut_height, $dst_width, $dst_height, $src_width, $src_height);

  }else{
	  $dst_height = 100;
	  $dst_width = ($dst_height/$src_height)*$src_width;
	  $cut_width = $dst_width - 120;

	  $im = imagecreatetruecolor(120,100);
	  imagecopyresampled($im, $im_src, 0, 0, $cut_width, 0, $dst_width, $dst_height, $src_width, $src_height);
  }
  imagejpeg($im,$vdir_upload ."kecil_".$fupload_name);

  imagedestroy($im_src);
  imagedestroy($im);


  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  if(($src_width / $src_height) < (44 / 30)){
	  $dst_width = 880;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	  $cut_height = $dst_height - 600;

	  $im = imagecreatetruecolor(880,600);
	  imagecopyresampled($im, $im_src, 0, 0, 0, $cut_height, $dst_width, $dst_height, $src_width, $src_height);

  }else{
	  $dst_height = 600;
	  $dst_width = ($dst_height/$src_height)*$src_width;
	  $cut_width = $dst_width - 880;

	  $im = imagecreatetruecolor(880,600);
	  imagecopyresampled($im, $im_src, 0, 0, $cut_width, 0, $dst_width, $dst_height, $src_width, $src_height);
  }
  imagejpeg($im,$vdir_upload ."sedang_".$fupload_name);

  imagedestroy($im_src);
  imagedestroy($im);
  unlink($vdir_upload.$fupload_name);

  //unlink($vfile_upload);
  return true;
}

function UploadGaris($fupload_name){
  $vdir_upload = LOKASI_FOTO_GARIS;

  $vfile_upload = $vdir_upload . $fupload_name;

  move_uploaded_file($_FILES["foto"]["tmp_name"], $vfile_upload);

  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  if(($src_width / $src_height) < (12 / 10)){
	  $dst_width = 120;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	  $cut_height = $dst_height - 100;

	  $im = imagecreatetruecolor(120,100);
	  imagecopyresampled($im, $im_src, 0, 0, 0, $cut_height, $dst_width, $dst_height, $src_width, $src_height);

  }else{
	  $dst_height = 100;
	  $dst_width = ($dst_height/$src_height)*$src_width;
	  $cut_width = $dst_width - 120;

	  $im = imagecreatetruecolor(120,100);
	  imagecopyresampled($im, $im_src, 0, 0, $cut_width, 0, $dst_width, $dst_height, $src_width, $src_height);
  }
  imagejpeg($im,$vdir_upload ."kecil_".$fupload_name);

  imagedestroy($im_src);
  imagedestroy($im);


  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  if(($src_width / $src_height) < (44 / 30)){
	  $dst_width = 880;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	  $cut_height = $dst_height - 600;

	  $im = imagecreatetruecolor(880,600);
	  imagecopyresampled($im, $im_src, 0, 0, 0, $cut_height, $dst_width, $dst_height, $src_width, $src_height);

  }else{
	  $dst_height = 600;
	  $dst_width = ($dst_height/$src_height)*$src_width;
	  $cut_width = $dst_width - 880;

	  $im = imagecreatetruecolor(880,600);
	  imagecopyresampled($im, $im_src, 0, 0, $cut_width, 0, $dst_width, $dst_height, $src_width, $src_height);
  }
  imagejpeg($im,$vdir_upload ."sedang_".$fupload_name);

  imagedestroy($im_src);
  imagedestroy($im);
  unlink($vdir_upload.$fupload_name);

  //unlink($vfile_upload);
  return true;
}
function UploadArea($fupload_name){
  $vdir_upload = LOKASI_FOTO_AREA;

  $vfile_upload = $vdir_upload . $fupload_name;

  move_uploaded_file($_FILES["foto"]["tmp_name"], $vfile_upload);

  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  if(($src_width / $src_height) < (12 / 10)){
	  $dst_width = 120;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	  $cut_height = $dst_height - 100;

	  $im = imagecreatetruecolor(120,100);
	  imagecopyresampled($im, $im_src, 0, 0, 0, $cut_height, $dst_width, $dst_height, $src_width, $src_height);

  }else{
	  $dst_height = 100;
	  $dst_width = ($dst_height/$src_height)*$src_width;
	  $cut_width = $dst_width - 120;

	  $im = imagecreatetruecolor(120,100);
	  imagecopyresampled($im, $im_src, 0, 0, $cut_width, 0, $dst_width, $dst_height, $src_width, $src_height);
  }
  imagejpeg($im,$vdir_upload ."kecil_".$fupload_name);

  imagedestroy($im_src);
  imagedestroy($im);


  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  if(($src_width / $src_height) < (44 / 30)){
	  $dst_width = 880;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	  $cut_height = $dst_height - 600;

	  $im = imagecreatetruecolor(880,600);
	  imagecopyresampled($im, $im_src, 0, 0, 0, $cut_height, $dst_width, $dst_height, $src_width, $src_height);

  }else{
	  $dst_height = 600;
	  $dst_width = ($dst_height/$src_height)*$src_width;
	  $cut_width = $dst_width - 880;

	  $im = imagecreatetruecolor(880,600);
	  imagecopyresampled($im, $im_src, 0, 0, $cut_width, 0, $dst_width, $dst_height, $src_width, $src_height);
  }
  imagejpeg($im,$vdir_upload ."sedang_".$fupload_name);

  imagedestroy($im_src);
  imagedestroy($im);
  unlink($vdir_upload.$fupload_name);

  //unlink($vfile_upload);
  return true;
}

function UploadLogo($fupload_name,$old_foto,$tipe_file){
  $vdir_upload = LOKASI_LOGO_DESA;
  unlink($vdir_upload.$old_foto);
  $vfile_upload = $vdir_upload . $fupload_name;

  if($tipe_file == "image/jpeg" OR $tipe_file == "image/pjpeg"){

  move_uploaded_file($_FILES["logo"]["tmp_name"], $vfile_upload);
  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  if($src_width < $src_height){
	  $dst_width = 100;
	  $dst_height = ($dst_width/$src_width)*$src_height;
	  $cut_height = $dst_height - 100;

	  $im = imagecreatetruecolor(100,100);
	  imagecopyresampled($im, $im_src, 0, 0, 0, $cut_height, $dst_width, $dst_height, $src_width, $src_height);

  }else{
	  $dst_height = 100;
	  $dst_width = ($dst_height/$src_height)*$src_width;
	  $cut_width = $dst_width - 100;

	  $im = imagecreatetruecolor(100,100);
	  imagecopyresampled($im, $im_src, 0, 0, $cut_width, 0, $dst_width, $dst_height, $src_width, $src_height);
  }
  imagejpeg($im,$vdir_upload .$fupload_name);

  imagedestroy($im_src);
  imagedestroy($im);

  return true;
  }else{
	move_uploaded_file($_FILES["logo"]["tmp_name"], $vfile_upload);
  }
}

function UploadLogox($fupload_name){
 $vdir_upload = "assets/images/background/";
  $vfile_upload = $vdir_upload . $fupload_name;

  move_uploaded_file($_FILES["logo"]["tmp_name"], $vfile_upload);
}

function UploadSimbol($fupload_name){
 $vdir_upload = "assets/images/gis/point/";
  $vfile_upload = $vdir_upload . $fupload_name;

  move_uploaded_file($_FILES["simbol"]["tmp_name"], $vfile_upload);
}

define ('MIME_TYPE_DOKUMEN', serialize (array(
  "application/x-download",
  "application/pdf",
  "application/ppt",
  "application/pptx",
  "application/excel",
  "application/msword",
  "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
  "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
  "text/rtf",
  "application/powerpoint",
  "application/vnd.ms-powerpoint",
  "application/vnd.ms-excel",
  "application/msexcel")));

define ('MIME_TYPE_GAMBAR', serialize (array(
  'image/jpeg', 'image/pjpeg',
  'image/png',  'image/x-png' )));

define ('MIME_TYPE_ARSIP', serialize (array(
  'application/rar','application/x-rar','application/x-rar-compressed','application/octet-stream',
  'application/zip','application/x-zip','application/x-zip-compressed')));

function UploadDocument($fupload_name){
  $vdir_upload = LOKASI_DOKUMEN;

  $vfile_upload = $vdir_upload . $fupload_name;

  move_uploaded_file($_FILES["satuan"]["tmp_name"], $vfile_upload);


  //unlink($vfile_upload);
  return true;
}

function UploadDocument2($fupload_name){
  $vdir_upload = LOKASI_DOKUMEN;

  $vfile_upload = $vdir_upload . $fupload_name;

  move_uploaded_file($_FILES["dokumen"]["tmp_name"], $vfile_upload);


  //unlink($vfile_upload);
  return true;
}

function UploadPengesahan($fupload_name){
  $vdir_upload = LOKASI_PENGESAHAN;
  $vfile_upload = $vdir_upload . $fupload_name;
  move_uploaded_file($_FILES["pengesahan"]["tmp_name"], $vfile_upload);

  $im_src = imagecreatefromjpeg($vfile_upload);
  $src_width = imageSX($im_src);
  $src_height = imageSY($im_src);
  if(($src_width / $src_height) < (12 / 10)){
    $dst_width = 120;
    $dst_height = ($dst_width/$src_width)*$src_height;
    $cut_height = $dst_height - 100;

    $im = imagecreatetruecolor(120,100);
    imagecopyresampled($im, $im_src, 0, 0, 0, $cut_height, $dst_width, $dst_height, $src_width, $src_height);

  }else{
    $dst_height = 100;
    $dst_width = ($dst_height/$src_height)*$src_width;
    $cut_width = $dst_width - 120;

    $im = imagecreatetruecolor(120,100);
    imagecopyresampled($im, $im_src, 0, 0, $cut_width, 0, $dst_width, $dst_height, $src_width, $src_height);
  }
}
?>
