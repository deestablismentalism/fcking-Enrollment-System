<!DOCTYPE html>
<?php 
    include_once __DIR__ . '/../adminPages/admin_base_designs.php';
?>
<link rel="stylesheet" href="../css/admin_sections.css">
</head>
<html>
    <?php 
        include_once __DIR__ . '/../adminPages/admin_base_designs.php';
    ?>
    <body>
        
        <div class="sections-container">
        <div class="sections-form"> 
            <form action="../server_side/post_sections.php" method="post" class="form"> 
                <input type="text" name="section-name" placeholder="Enter Section Name..." required>
                <select name="section-level">
                    <?php
                        include_once __DIR__ . '/../server_side/getGradeLevels.php';
                        $gradeLevels = new getGradeLevels();
                        $gradeLevels->createSelectValues();
                    ?>
                </select>
                <button type="submit" class="submit-btn">Add Section</button>
            </form>
        </div>
        <div class="sections-list">
            <h2> Sections List </h2>
            <table class="sections-table">
                <thead> 
                    <tr>
                        <th> Section Name </th>
                        <th> Grade Level </th>
                    </tr>
                </thead>
                <tbody> 
                    <?php 
                    include_once __DIR__ . '/../server_side/adminSectionsView.php';
                        $view = new adminSectionsView();
                        $view->displayAdminSections();
                    ?>
                </tbody>
            </table>
        </div>
        </div>
    </body>
</html>