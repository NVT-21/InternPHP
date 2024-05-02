<?php
function titleAtom($titleText) {
    echo "<h1>$titleText</h1>";
}
function labelAtom($labelText) {
    echo "<label>$labelText</label>";
}
function textInputAtom() {
    echo "<input type='text'>";
}
function textAreaAtom() {
    echo "<textarea></textarea>";
}
function selectInputAtom() {
    echo "<select></select>";
}
function dateInputAtom() {
    echo "<input type='date'>";
}
function buttonAtom($buttonText) {
    echo "<button>$buttonText</button>";
}
function tdAtom($cellData) {
    echo "<td>$cellData</td>";
}
function thAtom($headerText) {
    echo "<th>$headerText</th>";
}
function theadAtom() {
    echo "<thead></thead>";
}
?>
