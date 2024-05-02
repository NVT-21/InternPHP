<?php
require_once('atom.php');
//- text input field: bao gồm atoms label + text input
function textInputFieldMolecule($labelText) {
    labelAtom($labelText);
    textInputAtom();
}
// text area field
function textAreaFieldMolecule($labelText) {
    labelAtom($labelText);
    textAreaAtom();
}
// select field
function selectFieldMolecule($labelText) {
    labelAtom($labelText);
    selectInputAtom();
}
// date picker field
function datePickerFieldMolecule($labelText) {
    labelAtom($labelText);
    dateInputAtom();
}
// checkbox field
function checkboxFieldMolecule($labelText) {
    echo "<label><input type='checkbox'> $labelText</label>";
}
//- table: bao gồm atoms td + th + thead
function tableMolecule($headers, $data) {
    echo "<table>";
    echo "<thead>";
    foreach ($headers as $header) {
        thAtom($header);
    }
    echo "</thead>";
    echo "<tbody>";
    foreach ($data as $row) {
        echo "<tr>";
        foreach ($row as $cell) {
            tdAtom($cell);
        }
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}
// pagination: dùng cho phân trang
function paginationMolecule($currentPage, $totalPages) {
    echo "<div class='pagination'>";
    echo "Page: ";
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $currentPage) {
            echo "<span>$i</span>";
        } else {
            echo "<a href='#'>$i</a>";
        }
    }
    echo "</div>";
}
// modal
function modalMolecule($modalTitle, $modalContent) {
    echo "<div class='modal'>";
    echo "<div class='modal-header'>$modalTitle</div>";
    echo "<div class='modal-body'>$modalContent</div>";
    echo "</div>";
}

?>