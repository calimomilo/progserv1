<?php

//EXERCICE 1A

const DATABASE_FILE = './grades.db';
$pdo = new PDO("sqlite:" . DATABASE_FILE);

$sql = "CREATE TABLE IF NOT EXISTS courses (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    acronym TEXT,
    grade FLOAT NOT NULL
);";

$pdo->exec($sql);

//EXERCICE 1B

function addGrade($name, $grade, $acronym = null){
    global $pdo;
    $sql = "INSERT INTO courses (name, acronym, grade) VALUES ('$name', '$acronym', '$grade');";
    $pdo->exec($sql);

    $gradeId = $pdo->lastInsertId();
    return $gradeId;
}

$analyseMarId = addGrade('Analyse de marché', 4.5, 'AnalyseMar');
$comVisId = addGrade('Communication visuelle', 4.8, 'ComVis');
$ecrireWebId = addGrade('Ecrire pour le web', 4.2, 'EcrireWeb');
$baseProg2Id = addGrade('Bases de la programmation 2', 4.9, 'BaseProg2');
$evolMetMedId = addGrade('Evolution et métiers des média', 5, 'EvolMetMed');
$droit1Id = addGrade('Droit des médias 1', 4.1, 'Droit1');
$introDuraId = addGrade('Introduction à la durabilité', 4.4, 'IntroDura');
$progServ1Id = addGrade('Programmation serveur 1', 5.3, 'ProgServ1');

//EXERCICE 1C -> YA RIEN QUI S'AFFICHE

function getGrade($id){
    global $pdo;

    $sql = "SELECT * FROM courses WHERE id = $id";

    $grade = $pdo->query($sql);

    $grade = $grade->fetch();

    return $grade;
}

$progServ1 = getGrade($progServ1Id);

if ($progServ1) {
    // On affiche le cours récupéré
    echo "<h1>Informations sur le cours</h1>";
    echo "<p><strong>Identifiant</strong> : " . $progServ1['id'] . "</p>";
    echo "<p><strong>Nom</strong> : " . $progServ1['name'] . "</p>";
    echo "<p><strong>Acronyme</strong> : " . $progServ1['acronym'] . "</p>";
    echo "<p><strong>Note</strong> : " . $progServ1['grade'] . "</p>";
} else {
    echo "<p>Aucun cours trouvé avec cet identifiant.</p>";
}

$notFound = getGrade(9999);

if ($notFound) {
    // On affiche le cours récupéré
    echo "<h1>Informations sur le cours</h1>";
    echo "<p><strong>Identifiant</strong> : " . $notFound['id'] . "</p>";
    echo "<p><strong>Nom</strong> : " . $notFound['name'] . "</p>";
    echo "<p><strong>Acronyme</strong> : " . $notFound['acronym'] . "</p>";
    echo "<p><strong>Note</strong> : " . $notFound['grade'] . "</p>";
} else {
    echo "<p>Aucun cours trouvé avec cet identifiant.</p>";
}

//EXERCICE 1D

function getGrades(){
    global $pdo;

    $sql = "SELECT * FROM courses";

    $grades = $pdo->query($sql);

    $grades = $grades->fetchAll();

    return $grades;
}

$grades = getGrades();

?>
<h1>Liste des cours</h1>
<table>
    <tr>
        <th>Identifiant</th>
        <th>Nom</th>
        <th>Acronyme</th>
        <th>Note</th>
    </tr>

    <?php foreach ($grades as $grade): ?>
        <tr>
            <td><?php echo $grade['id']; ?></td>
            <td><?php echo $grade['name']; ?></td>
            <td><?php echo $grade['acronym']; ?></td>
            <td><?php echo $grade['grade']; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

<?php

// EXERCICE 1E

function removeGrade($id){
    global $pdo;

    $sql = "DELETE FROM courses WHERE id = $id";

    return $pdo->exec($sql);
}

$numberOfAffectedRows = removeGrade($baseProg2Id);

if ($numberOfAffectedRows == 1) {
    echo "<p>Le cours avec l'identifiant $baseProg2Id a été supprimé avec succès.</p>";
} else {
    echo "<p>Erreur lors de la suppression du cours avec l'identifiant $baseProg2Id.</p>";
}

// On essaie de supprimer un cours avec un identifiant qui n'existe pas
$numberOfAffectedRows = removeGrade(9999);

if ($numberOfAffectedRows == 1) {
    echo "<p>Le cours avec l'identifiant 9999 a été supprimé avec succès.</p>";
} else {
    echo "<p>Aucun cours trouvé avec cet identifiant (9999).</p>";
}