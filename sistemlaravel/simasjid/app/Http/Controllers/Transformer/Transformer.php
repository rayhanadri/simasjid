<?php

namespace App\Http\Controllers\Transformer;

class Transformer
{
    public static function jabatan($id_jabatan)
    {
        switch ($id_jabatan) {
            case 1:
                return "Ketua";
                break;
            case 2:
                return "Sekretaris";
                break;
            case 3:
                return "Bendahara";
                break;
            case 4:
                return "Takmir";
                break;
            default:
                return "lain-lain";
                break;
        }
    }
}
