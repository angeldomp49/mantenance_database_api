<?php

namespace MakechTec\XochiDigital\Mantenance\Column;

use MakechTec\XochiDigital\Mantenance\Models\Column;

interface ColumnStrategy{

    public function makeColumn(Column $column);

}