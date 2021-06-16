<?php

defined('BASEPATH') or exit('No direct script access allowed');


class JsonParser
{
    private function getPositions($jsonString, $char): array
    {
        $indexes = [];
        $indexArray = 0;
        $auxArray = [];

        $reverseChar = ($char == '[') ? ']' : '}';

        for ($i = 0; $i < strlen($jsonString); $i++) {
            if ($jsonString[$i] == $char) {
                $auxArray[$indexArray] = [
                    'starts' => $i,
                    'char'   => $char
                ];
                $indexes[] = $indexArray;
                $indexArray++;
            } else if ($jsonString[$i] == $reverseChar) {
                $lastIndex = array_pop($indexes);
                $auxArray[$lastIndex]['ends'] = $i;
            }
        }
        return $auxArray;
    }

    private function orderPositions(&$array): void
    {
        $total = count($array);
        for ($i = 0; $i < $total; $i++) {
            for ($j = $total - 1; $j > $i; $j--) {
                if ($array[$j]['starts'] < $array[$i]['starts']) {
                    $aux = $array[$i];
                    $array[$i] = $array[$j];
                    $array[$j] = $aux;
                }
            }
        }
    }


    private function resolveArray(&$array, string $jsonString): string
    {
        foreach ($array as &$r) {
            $subIni = "";
            if (isset($r['ends'])) {
                $subIni = substr($jsonString, $r['starts'], $r['ends'] - $r['starts']);
            } else {
                $part1 = substr($jsonString, 0, strlen($jsonString) - $r['starts']);
                $part2 = substr($jsonString, $r['starts']);
                $reverseChar = ($r['char'] == '[') ? ']' : '}';
                $jsonString = $part1 . $reverseChar . $part2;
                $subIni = substr($jsonString, $r['starts']);
            }

            $lenSub = strlen($subIni);
            $subEnd = $subIni[$lenSub - 3] . $subIni[$lenSub - 2] . $subIni[$lenSub - 1];
            $subEndTwo = $subIni[$lenSub - 2] . $subIni[$lenSub - 1];

            $replace = "";
            if ($subEndTwo == "},") {
                $replace = substr($subIni, 0, strlen($subIni) - 2) . '}';
            } else if ($subEndTwo == "],") {
                $replace = substr($subIni, 0, strlen($subIni) - 2) . ']';
            } else if ($subEnd == "],]") {
                $replace = substr($subIni, 0, strlen($subIni) - 3) . ']]';
            } else if ($subEnd == "},]") {
                $replace = substr($subIni, 0, strlen($subIni) - 3) . '}]';
            }
            if ($replace !== "") {
                $jsonString = str_replace($subIni, $replace, $jsonString);
            }
        }
        return $jsonString;
    }

    private function addMarks(string $jsonString): string
    {
        $jsonString = str_replace("enderecos: ", '"enderecos":', $jsonString);
        $jsonString = str_replace("beneficios: ", '"beneficios":', $jsonString);
        return $jsonString;
    }

    public function parseJson(string $jsonString): string
    {
        $arr1 = $this->getPositions($jsonString, '[');
        $this->orderPositions($arr1);
        $resolved = $this->resolveArray($arr1, $jsonString);
        $resolvedWithMarks = trim($this->addMarks($resolved));

        if (strpos($resolvedWithMarks, "[{") === 0) {
            $lastIndex = strlen($resolvedWithMarks) - 1;
            $lastTwo = $resolvedWithMarks[$lastIndex - 1] . $resolvedWithMarks[$lastIndex];
            if ($lastTwo !== "}]") {
                $resolvedWithMarks[$lastIndex] = '}';
                $resolvedWithMarks .= "]";
            }
        }

        return $resolvedWithMarks;
    }
}
