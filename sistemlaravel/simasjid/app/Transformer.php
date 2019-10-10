<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transformer extends Model
{
    public static function jabatan($id_jabatan)
    {
        switch ($id_jabatan) {
            case 1:
                return "Ketua Takmir";
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
                return "Lain-lain";
                break;
        }
    }

    public static function status($aktif)
    {
        switch ($aktif) {
            case 0:
                return '<font color="red"><strong>Non-Aktif</strong></font>';
                break;
            case 1:
                return '<font color="green"><strong>Aktif</strong></font>';
                break;
            case 2:
                return '<font color="grey"><strong>Aktif</strong></font>';
                break;
            default:
                return '<font color="FFC433"><strong>Aktif</strong></font>';
                break;
        }
    }
}
