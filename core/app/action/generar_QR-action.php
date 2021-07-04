<?php
include "./phpqrcode/qrlib.php";
if (isset($_SESSION["id"]) && isset($_POST["id_grupo"]) && isset($_POST['codigo_qr'])) :
    $kinds = KindData::getById($_SESSION["id"]);
    foreach ($kinds as $value) :
        if ($value->id_kind == '1' || $value->id_kind == '2') :
            $grupo = GrupoData::getById($_POST["id_grupo"]);
            if ($grupo->codigo_qr == "" || $grupo->codigo_qr != $_POST['codigo_qr']) :
                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

                $grupo->codigo_qr = substr(str_shuffle($permitted_chars), 0, 10);
                $grupo->update_qr();
                $enlace = 'http://localhost/leesin/?action=agregar_asistencia&id=' . $grupo->codigo_qr . '&grupo=' . $_POST["id_grupo"];

                $QR = QRcode::png($enlace);
                echo '
                    <input type="hidden" id="id_grupo" value="<?= $_GET["id_grupo"] ?>">
                    <input type="hidden" id="codigo_qr" value="<?= $grupo->codigo_qr  ?>">
                    <?= $QR ?>';
            endif;
            break;
        endif;
    endforeach;
endif;
