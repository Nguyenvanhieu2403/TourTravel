<?php require('includes/header.html'); ?>
<?php require('includes/navbar.html'); ?>
<?php
	include_once('../assets/database/ConnectToSql.php');
?>
<div class="header-destination header-destination__detail ">
    <div class="content">
        <h1 class="text-center fw-bold text-light">Destination Details</h1>
        <div class="row">
            <h2 class="text-center dirc_destination__detail">
                <a href="#" class="header-destination__home header-destination__detail__home text-light">Home</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-double-right text-danger" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"/>
                    <path fill-rule="evenodd" d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
                <span class="header-destination__destination header-destination__detail__destination__detail text-light">Destination detail</span>
            </h2>
        </div>
    </div>
</div>  

<!-- Post comment -->
<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idBlog = $_GET['id'];

        // Kiểm tra và gán giá trị cho các biến
        $name = isset($_POST["name"]) ? $_POST["name"] : '';
        $email = isset($_POST["email"]) ? $_POST["email"] : '';
        $message = isset($_POST["message"]) ? $_POST["message"] : '';
        $rating = isset($_POST["rating"]) ? $_POST["rating"] : '';

        // Kiểm tra xem các biến có giá trị hay không
        if (!empty($name) && !empty($email) && !empty($message) && !empty($rating)) {
            $insertQuery = "INSERT INTO comments (IdBlog, FullName, Email, Message, Rate, Status, DateCreate)
                            VALUES ('$idBlog', '$name', '$email', '$message', $rating, 1, NOW())";
            mysqli_query($con, $insertQuery);
        }
    }
?>
<!-- Load comment -->
<?php
    // Pagination
    $idBlog = $_GET['id'];
    $query = "SELECT * from comments where idBlog = $idBlog";

    $detailComment = mysqli_query($con, $query);
?>

<!-- Load detail blog -->
<?php
    $query = "";
    //  Search blog 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])){
        $searchBlog = $_POST['title'];
        $idBlog = $_GET['id'];
        $query = "SELECT blogs.*, employees.FullName, comments.IdBlog, (SELECT COUNT(*) FROM comments WHERE comments.IdBlog = blogs.Id) AS totalcomment
        FROM blogs 
        left JOIN employees  ON blogs.EmployeeId = employees.Id 
        left JOIN comments ON blogs.Id = comments.IdBlog 
        where blogs.Title  LIKE '%$searchBlog%' GROUP BY blogs.Id limit 1;";
    }
    else {
        $idBlog = $_GET['id'];
        $query = "SELECT blogs.*, employees.FullName, comments.IdBlog, (SELECT COUNT(*) FROM comments WHERE comments.IdBlog = blogs.Id) AS totalcomment
        FROM blogs 
        left JOIN employees  ON blogs.EmployeeId = employees.Id 
        left JOIN comments ON blogs.Id = comments.IdBlog 
        where blogs.Id = $idBlog GROUP BY blogs.Id limit 1;";
    }
    $sql_blogDetail= mysqli_query($con,$query); 
?>

<?php
    if(mysqli_num_rows($sql_blogDetail) > 0) {
        while ($row_blogDetail = mysqli_fetch_array($sql_blogDetail)) {
?>
<div class="container blog-detail-container">
    <div class="row pt-5">
        <div class="col-md-8 blog-detail-left-side">
            <div class="blog-detail-heading">
                <h2><?php echo $row_blogDetail['Title'] ?></h2>
            </div>
            <div class="blog-detail-content">
                
                <div class="blog-detail-post d-flex my-3">
                    <a href="#">
                        <div class="blog-detail-post-author">
                            <i class="fa-solid fa-circle-user blog-item-icon"></i>
                            <span><?php echo $row_blogDetail['FullName'] ?></span>
                        </div>
                    </a>
                    <a href="#">
                        <div class="blog-detail-post-date">
                            <i class="fa-regular fa-calendar blog-item-icon"></i>
                            <span><?php echo date('F d, Y', strtotime($row_blogDetail['DateCreate'])); ?></span>
                        </div>
                    </a>
                    <a href="#">
                        <div class="blog-detail-post-comment">
                            <i class="fa-regular fa-comment blog-item-icon"></i>
                            <span>Comment (<?php echo $row_blogDetail['totalcomment']?>)</span>
                        </div>
                    </a>
                </div>
                <div class="blog-detail-img">
                    <img src="../../../user/assets/img/blogs_detail/<?php echo $row_blogDetail['image']?>" alt="">
                </div>
                <div class="blog-detail-text">
                    <p>
                       <?php echo $row_blogDetail['Description']?>
                    </p>
                </div>
                <div class="blog-detail-comment" id="commentSection">
                    <div class="blog-detail-comment-list">
                        <div class="blog-detail-comment-heading my-3">
                            <h3>Comment <span>(<?php echo $row_blogDetail['totalcomment']?>)</span></h3>
                        </div>
                        <?php
                            if (mysqli_num_rows($detailComment) > 0) {
                                $commentCount = 0;
                                while ($row_comment = mysqli_fetch_array($detailComment)) {
                                    if ($commentCount < 3) {
                        ?>
                        <div class="blog-detail-comment-item my-4 d-flex">
                            <div class="blog-detail-comment-img me-4">
                                <img src="../assets/img/comment/comment-user-1.png" alt="">
                            </div>
                            <div class="blog-detail-comment-content">
                                <div class="blog-detail-comment-post d-flex justify-content-between">
                                    <div class="blog-detail-post-left">
                                        <div class="blog-detail-comment-name">
                                            <h6><?php echo $row_comment['FullName'] ?></h6>
                                        </div>
                                        <div class="blog-detail-comment-date">
                                            <span><?php 
                                                $timestamp = strtotime($row_comment['DateCreate']);
                                                echo date('j F, Y h.iA', $timestamp);
                                            ?></span>
                                        </div>
                                    </div>
                                    <div class="blog-detail-post-right">
                                        <div class="blog-detail-comment-rate">
                                            <?php
                                                $rating = $row_comment['Rate'] ?? 0;
                                                $filledStars = str_repeat('<i class="fa-solid fa-star icon-rating"></i>', $rating);
                                                $emptyStars = str_repeat('<i class="fa-regular icon-unrating fa-star"></i>', 5 - $rating);
                                                echo $filledStars . $emptyStars;
                                            ?>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="blog-detail-comment-text">
                                    <p><?php echo $row_comment['Message'] ?></p>
                                </div>
                                <div class="blog-detail-reply-btn">
                                    <a href="#">
                                        <i class="fa-solid fa-reply-all"></i>
                                        Reply
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                                    $commentCount++;
                                    }
                                    else {
                                        $hiddenComments[] = $row_comment;
                                    }
                                }
                            }
                        ?>
    

                        <?php
                            if (!empty($hiddenComments)) {
                                echo '<script>var hiddenComments = ' . json_encode($hiddenComments) . ';</script>';
                            }
                        ?>
                    </div>

                    <div class="comment-btn text-center" id="commentLinksContainer">
                        <?php if (mysqli_num_rows($detailComment) > 3) { ?>
                            <a href="javascript:void(0);" id="viewAllComments">View All Comment</a>
                            <a href="javascript:void(0);" id="hideComments">Hide Comments</a>
                        <?php } ?>
                    </div>
                </div>
                <div class="blog-detail-leave-comment">
                    <div class="blog-detail-leave-comment-heading">
                        <h3>Leave Your Comment</h3>
                    </div>
                    <div class="blog-detail-leave-comment-form">
                        <form class="blog-detail-form" method="post">
                            <div class="row">
                                <div class="col-md-10 ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="blog-detail-form-name">
                                                
                                                <input type="text" placeholder="Your name" name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="blog-detail-form-email">
                                                
                                                <input type="text" placeholder="Your email" name="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="blog-detail-form-message">
                                        <textarea name="message" name="message" cols="30" rows="10" placeholder="Your message"></textarea>
                                    </div>
                                    <div class="blog-detail-form-rate my-5" id="ratingStars">
                                        <?php
                                            $rating = $row_comment['Rate'] ?? 0;
                                            for ($i = 1; $i <= 5; $i++) {
                                                echo '<i class="fa-regular fa-star' . ($i <= $rating ? ' filled' : '') . '" data-rating="' . $i . '"></i>';
                                            }
                                        ?>
                                        <input type="hidden" name="rating" value="<?php echo $rating; ?>">
                                    </div>
                                    <div class="blog-detail-form-button">
                                        <button type="submit">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Search function -->
        
        <div class="col-md-4 blog-detail-right-side">
            <div class="blog-detail-search">
                <div class="blog-detail-search-heading my-2">
                    <h4>Search here</h4>
                </div>
                <form action="" method="post" id="" class="mt-5">
                    <div class="blog-detail-search-group d-flex">
                        <input type="search" name="title" placeholder="Your Blog">
                        <button type="submit" name="search">SEARCH</button>
                    </div>
                </form>
            </div>
            <div class="blog-detail-categories my-5">
                <div class="blog-detail-categories-title my-3">
                   <h4> Categories</h4>
                </div>
                <ul class="blog-detail-categories-body">
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <h6>
                                <i class="fa-solid fa-angles-right"></i>
                                New York City
                            </h6>
                            <span>(20)</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <h6>
                                <i class="fa-solid fa-angles-right"></i>
                                Adventure Tour
                            </h6>
                            <span>(08)</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <h6>
                                <i class="fa-solid fa-angles-right"></i>
                                Group Tour
                            </h6>
                            <span>(09)</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <h6>
                                <i class="fa-solid fa-angles-right"></i>
                                Couple Tour
                            </h6>
                            <span>(18)</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="d-flex justify-content-between">
                            <h6>
                                <i class="fa-solid fa-angles-right"></i>
                                Village Tour
                            </h6>
                            <span>(09)</span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="blog-detail-new-post py-3">
                <div class="blog-detail-new-post-heading mb-5">
                    <h4>New Post</h4>
                </div>
                <ul class="blog-detail-list-posts">
                    <li class="blog-detail-post-item my-4 d-flex">
                        <div class="blog-detail-post-img flex-1">
                            <img src="../assets/img/blogs_detail/blog-md-1.png" alt="">
                        </div>
                        <div class="blog-detail-post-infor">
                            <div class="blog-detail-post-heading">
                                <p class="m-0">Map where your photos were taken and discover local points.</p>
                            </div>
                            <div class="blog-detail-post-group d-flex">
                                <div class="blog-detail-post-writer">
                                    <i class="fa-solid fa-circle-user blog-item-icon"></i>
                                    <span> By John Smith</span>
                                </div>
                                <div class="blog-detail-posts-date">
                                    <i class="fa-regular fa-calendar blog-item-icon"></i>
                                    <span>Novembar 16, 2021</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="blog-detail-post-item my-4 d-flex">
                        <div class="blog-detail-post-img flex-1">
                            <img src="../assets/img/blogs_detail/blog-md-1.png" alt="">
                        </div>
                        <div class="blog-detail-post-infor">
                            <div class="blog-detail-post-heading">
                                <p class="m-0">Map where your photos were taken and discover local points.</p>
                            </div>
                            <div class="blog-detail-post-group d-flex">
                                <div class="blog-detail-post-writer">
                                    <i class="fa-solid fa-circle-user blog-item-icon"></i>
                                    <span> By John Smith</span>
                                </div>
                                <div class="blog-detail-posts-date">
                                    <i class="fa-regular fa-calendar blog-item-icon"></i>
                                    <span>Novembar 16, 2021</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="blog-detail-post-item my-4 d-flex">
                        <div class="blog-detail-post-img flex-1">
                            <img src="../assets/img/blogs_detail/blog-md-1.png" alt="">
                        </div>
                        <div class="blog-detail-post-infor">
                            <div class="blog-detail-post-heading">
                                <p class="m-0">Map where your photos were taken and discover local points.</p>
                            </div>
                            <div class="blog-detail-post-group d-flex">
                                <div class="blog-detail-post-writer">
                                    <i class="fa-solid fa-circle-user blog-item-icon"></i>
                                    <span> By John Smith</span>
                                </div>
                                <div class="blog-detail-posts-date">
                                    <i class="fa-regular fa-calendar blog-item-icon"></i>
                                    <span>Novembar 16, 2021</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="blog-detail-post-item my-4 d-flex">
                        <div class="blog-detail-post-img flex-1">
                            <img src="../assets/img/blogs_detail/blog-md-1.png" alt="">
                        </div>
                        <div class="blog-detail-post-infor">
                            <div class="blog-detail-post-heading">
                                <p class="m-0">Map where your photos were taken and discover local points.</p>
                            </div>
                            <div class="blog-detail-post-group d-flex">
                                <div class="blog-detail-post-writer">
                                    <i class="fa-solid fa-circle-user blog-item-icon"></i>
                                    <span> By John Smith</span>
                                </div>
                                <div class="blog-detail-posts-date">
                                    <i class="fa-regular fa-calendar blog-item-icon"></i>
                                    <span>Novembar 16, 2021</span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="blog-detail-post-item my-4 d-flex">
                        <div class="blog-detail-post-img flex-1">
                            <img src="../assets/img/blogs_detail/blog-md-1.png" alt="">
                        </div>
                        <div class="blog-detail-post-infor">
                            <div class="blog-detail-post-heading">
                                <p class="m-0">Map where your photos were taken and discover local points.</p>
                            </div>
                            <div class="blog-detail-post-group d-flex">
                                <div class="blog-detail-post-writer">
                                    <i class="fa-solid fa-circle-user blog-item-icon"></i>
                                    <span> By John Smith</span>
                                </div>
                                <div class="blog-detail-posts-date">
                                    <i class="fa-regular fa-calendar blog-item-icon"></i>
                                    <span>Novembar 16, 2021</span>
                                </div>
                            </div>
                        </div>
                    </li>

                    
                </ul>
            </div>
            <div class="blog-detail-tags">
                <div class="blog-detail-tags-title my-5">
                    <h4>Tags</h4>
                </div>
                <div class="blog-detail-tags-body">
                    <a href="#">Adventure</a>
                    <a href="#">Trip</a>
                    <a href="#">Guided</a>
                    <a href="#">Historical</a>
                    <a href="#">Road Trips</a>
                    <a href="#">Tourist</a>
                </div>
            </div>
            <div class="blog-detail-gallery">
                <div class="blog-detail-gallery-title my-5">
                    <h4>Gallery</h4>
                </div>
                <div class="blog-detail-gallery-body">
                    <ul class="d-flex">
                        <li>
                            <a href="">
                                <img src="../assets/img/blogs_detail/blog-md-1.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="../assets/img/blogs_detail/blog-md-1.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="../assets/img/blogs_detail/blog-md-1.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="../assets/img/blogs_detail/blog-md-1.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="../assets/img/blogs_detail/blog-md-1.png" alt="">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="../assets/img/blogs_detail/blog-md-1.png" alt="">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    }
?>
<?php
    } else {
        echo "<h1>Không có dữ liệu</h1>";
    }
?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    // Fill star
    $(document).ready(function () {
        $("#ratingStars i").click(function () {
            var clickedRating = $(this).data("rating");
            $("#ratingStars i").removeClass("filled").removeClass("fa-solid").addClass("fa-regular");
            for (var i = 1; i <= clickedRating; i++) {
                $("#ratingStars i[data-rating='" + i + "']").addClass("filled").addClass("fa-solid").removeClass("fa-regular");
            }
            $("input[name='rating']").val(clickedRating);
        });
    });

    // Display all comments
    $(document).ready(function () {
        var commentSection = $("#commentSection");
        $('#hideComments').hide();

        $("#viewAllComments").on("click", function () {
            var listComments = $(".blog-detail-comment-list");
            if (typeof hiddenComments !== 'undefined' && hiddenComments.length > 0) {
                $.each(hiddenComments, function (index, comment) { // comment is mean each element in hiddenComments
                    var commentItem = $("<div>").addClass("blog-detail-comment-item hide-comment my-4 d-flex");
                    var htmlContent = `
                        <div class="blog-detail-comment-img me-4">
                            <img src="../assets/img/comment/comment-user-1.png" alt="">
                        </div>
                        <div class="blog-detail-comment-content">
                            <div class="blog-detail-comment-post d-flex justify-content-between">
                                <div class="blog-detail-post-left">
                                    <div class="blog-detail-comment-name">
                                        <h6>${comment['FullName']}</h6>
                                    </div>
                                    <div class="blog-detail-comment-date">
                                        <span>${new Date(comment['DateCreate']).toLocaleString()}</span>
                                    </div>
                                </div>
                                <div class="blog-detail-post-right">
                                    <div class="blog-detail-comment-rate" data-rating="${comment['Rate']}">
                                    </div>
                                </div>
                            </div>
                            <div class="blog-detail-comment-text">
                                <p>${comment['Message']}</p>
                            </div>
                            <div class="blog-detail-reply-btn">
                                <a href="#">
                                    <i class="fa-solid fa-reply-all"></i>
                                    Reply
                                </a>
                            </div>
                        </div>`;

                    commentItem.hide().html(htmlContent);
                    listComments.append(commentItem);

                    var ratingContainer = commentItem.find(".blog-detail-comment-rate");
                    var filledStars = '<i class="fa-solid fa-star icon-rating"></i>'.repeat(comment['Rate']);
                    var emptyStars = '<i class="fa-regular icon-unrating fa-star"></i>'.repeat(5 - comment['Rate']);
                    ratingContainer.html(filledStars + emptyStars);

                    commentItem.fadeIn();
                });
                $(".hide-comment").show();
                $("#viewAllComments").hide();
                $("#hideComments").show();
            }
        });
    });

    // Hide comment
    $(document).ready(function () {
    $('#hideComments').on('click', function () {
        $('.hide-comment').addClass('d-none');
        $("#viewAllComments").show();
        $(this).hide();
    });
});
</script>
<?php require('includes/footer.html'); ?>