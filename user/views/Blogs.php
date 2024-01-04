<?php require('includes/header.html'); ?>
<?php require('includes/navbar.html'); ?>
<?php include_once('../assets/database/ConnectToSql.php');?>

<div class="header-destination ">
    <div class="content">
        <h1 class="text-center fw-bold text-light">Blog</h1>
        <div class="row">
            <h2 class="text-center dirc_destination">
                <a href="#" class="header-destination__home text-light">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right text-danger" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                    <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
                <span class="header-destination__destination text-light">Blog</span>
            </h2>   
        </div>
    </div>
</div>

<?php
    // Pagination
    $items_per_page = 6;

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    $initial_page = ($current_page - 1) * $items_per_page;  
    $query = "SELECT blogs.*, employees.FullName 
          FROM blogs 
          INNER JOIN employees 
          ON blogs.EmployeeId = employees.Id";
    
    $sql_blogs = mysqli_query($con, $query);
    $total_rows = mysqli_num_rows($sql_blogs);   

    $query = "SELECT blogs.*, employees.FullName 
          FROM blogs 
          INNER JOIN employees 
          ON blogs.EmployeeId = employees.Id 
          LIMIT $initial_page, $items_per_page;";

    $sql_blogs = mysqli_query($con, $query);
?>

<div class="container">
    <div class="blog-items">
        <div class="row">
            <?php
            if (mysqli_num_rows($sql_blogs) > 0) {
                while ($row_blog = mysqli_fetch_array($sql_blogs)) {
            ?>
            <!-- Content -->
            <div class="col-md-4 ">
                <a href="Blog_Detail.php?id=<?php echo $row_blog['Id']; ?>">
                    <div class="blog-item" id="<?php echo $row_blog['Id'] ?>">
                        <div class="blog-item-img">
                            <img src="../../../user/assets/img/blogs/<?php echo $row_blog['image'] ?>" alt="" class="hover-zoom">
                        </div>
                        <div class="blog-item-content">
                            <a href="#" class="blog-item-writer">
                                <div class="blog-writer-icon">
                                    <i class="fa-solid fa-circle-user blog-item-icon"></i>
                                </div>
                                <div class="blog-writer-name"><?php echo $row_blog['FullName'] ?></div>
                            </a>
                            <a href="#" class="blog-item-date">
                                <div class="blog-date-icon">
                                    <i class="fa-regular fa-calendar blog-item-icon"></i>
                                </div>
                                <div class="blog-date-time"><?php echo date('F d, Y', strtotime($row_blog['DateCreate'])); ?></div>
                            </a>
                        </div>
                        <div class="blog-item-title">
                            <p> <?php echo $row_blog['Title'] ?></p>
                        </div>
                        <div class="blog-travle">
                            <a href="#">Tourist</a>
                        </div>
                    </div>
                </a>
            </div>
            <?php
                }
            ?>
            <?php
            } else {
                echo "<h1>Không có dữ liệu</h1>";
            }
            ?>
        </div>
    </div>
    <div class="blog-pagination">
        <ul class="blog-list">
            <li class="blog-pagination-item blog-page-arrow">
                <?php
                    $prev_page = ($current_page > 1) ? $current_page - 1 : 1;
                    echo '<a href="Blogs.php?page=' . $prev_page . '">
                            <i class="fa-solid fa-chevron-left"></i>
                        </a>';
                ?>
            </li>
            <?php 
                $total_pages = ceil ($total_rows / $items_per_page); 
                for($page_number = 1; $page_number<= $total_pages; $page_number++) {  
                    $current_class = ($page_number == $current_page) ? 'current-page' : '';
                    echo '<li class="blog-pagination-item ' . $current_class . '">
                            <a href="Blogs.php?page=' . $page_number . '">' . $page_number . '</a>
                        </li>';
                }  
            ?>
            <li class="blog-pagination-item blog-page-arrow">
                <?php
                    $next_page = ($current_page < $total_pages) ? $current_page + 1 : $total_pages;
                    echo '<a href="Blogs.php?page=' . $next_page . '">
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>';
                ?>
            </li>
        </ul>
    </div>
</div>

<?php require('includes/footer.html'); ?>




