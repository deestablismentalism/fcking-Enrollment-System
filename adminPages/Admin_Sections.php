<!DOCTYPE html>
<html>
    <?php 
        include_once __DIR__ . '/../adminPages/admin_base_designs.php';
    ?>
    <body>
        
        <form action="../server_side/post_sections.php" method="post"> 
                <input type="text" name="section-name" placeholder="Enter Section Name..." required>
                <select name="section-level">
                    <?php
                        include_once __DIR__ . '/../server_side/getGradeLevels.php';
                        $gradeLevels = new getGradeLevels();
                        $gradeLevels->createSelectValues();
                    ?>
                </select>
                <button type="submit"> Add section</button>
        </form>

        <div class="sections-list">
            <h2> Sections List </h2>
            <table>
                <thead> 
                    <th> Section Name </th>
                    <th> Grade Level </th>
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
    </body>
</html>