<?php

require __DIR__ . '/../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

function obtenerUsuariosDesdeExcel(): array
{
    $archivo = __DIR__ . '/politecnicosanvalerobdd.xlsx';

    if (!file_exists($archivo)) {
        return [];
    }

    $excel = IOFactory::load($archivo);
    $hoja = $excel->getSheetByName('Usuarios');

    if ($hoja === null) {
        return [];
    }

    $filas = $hoja->toArray();

    if (count($filas) < 2) {
        return [];
    }

    $encabezados = array_map(function ($valor) {
        return trim(strtolower((string) $valor));
    }, $filas[0]);

    $usuarios = [];

    for ($i = 1; $i < count($filas); $i++) {
        $fila = $filas[$i];
        $vacia = true;

        foreach ($fila as $valor) {
            if ($valor !== null && trim((string) $valor) !== '') {
                $vacia = false;
                break;
            }
        }

        if ($vacia) {
            continue;
        }

        $usuario = [];
        foreach ($encabezados as $indice => $campo) {
            $usuario[$campo] = $fila[$indice] ?? null;
        }

        $usuarios[] = $usuario;
    }

    return $usuarios;
}

return obtenerUsuariosDesdeExcel();
