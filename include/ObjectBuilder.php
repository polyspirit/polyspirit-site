<?php

class ObjectBuilder
{
    public string $result = '';

    public function __construct()
    {
        $this->addBrace();
    }

    public function build(): void
    {
        $this->addBrace(false);
        echo $this->result;
    }

    public function addProp(string $name, $value, bool $last = false): void
    {
        $this->result .= '<div class="prop js-typer">';

        $this->addName($name);
        $this->addValue($value, !$last);

        $this->result .= '</div>';
    }

    private function addBrace(bool $left = true): void
    {
        $brace = $left ? '{' : '}';
        $this->result .= '<div class="brace">' . $brace . '</div>';
    }

    private function addName(string $name): void
    {
        $this->result .= '<span class="prop-name js-typer-text" data-text="' . $name . '"></span>';
        $this->result .= '<span class="colon js-typer-text" data-text=":"></span> ';
    }

    private function addValue($value, bool $comma = true): void
    {
        if (is_string($value)) {
            if (stristr($value, 'http') !== false) {
                $this->addValueLink($value);
            } else {
                $this->addValueString($value);
            }
        } elseif (is_array($value)) {
            $this->addValueArray($value);
        }

        if ($comma) {
            $this->result .= '<span class="comma js-typer-text" data-text=","></span>';
        }
    }

    private function addValueString(string $value): void
    {
        $this->result .= '<span class="prop-value js-typer-text" data-text="'
            . $value
            . '" data-type="string"></span>';
    }

    private function addValueLink(string $value): void
    {
        $this->result .= '<a href="'
            . $value
            . '" target="_blank" class="prop-value js-typer-text" data-text="'
            . $value
            . '" data-type="string"></a>';
    }

    private function addValueArray(array $valuesArray): void
    {
        $this->result .= '<span class="bracket js-typer-text" data-text="["></span>';

        foreach ($valuesArray as $key => $value) {
            $this->result .= '<span class="prop-value js-typer-text" data-text="'
                . $value
                . '" data-type="string"></span>';
            if ($key < (count($valuesArray) - 1)) {
                $this->result .= '<span class="comma js-typer-text" data-text=","></span> ';
            }
        }

        $this->result .= '<span class="bracket js-typer-text" data-text="]"></span>';
    }

}
