<?php require(__DIR__. '\\include\\header-Links.html')?>
<?php 
    session_start();
?>
<body>
    <div class="test row m-0">
        <?php require('include/slideBar.html')?>
        <div class=" col-md-10 ">
            <div class="row">
                <div class="col-md-12">
                    <?php require('include/header.html')?>
                </div>
                <div class=" col-md-8">
                    <div class="container-working">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="working-check-time p-4">
                                    <div class="working-check-time-text mb-5">
                                        Check time
                                        <span role="img" aria-label="question-circle" class="anticon anticon-question-circle"><svg viewBox="64 64 896 896" focusable="false" data-icon="question-circle" width="1em" height="1em" fill="currentColor" aria-hidden="true"><path d="M512 64C264.6 64 64 264.6 64 512s200.6 448 448 448 448-200.6 448-448S759.4 64 512 64zm0 820c-205.4 0-372-166.6-372-372s166.6-372 372-372 372 166.6 372 372-166.6 372-372 372z"></path><path d="M623.6 316.7C593.6 290.4 554 276 512 276s-81.6 14.5-111.6 40.7C369.2 344 352 380.7 352 420v7.6c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8V420c0-44.1 43.1-80 96-80s96 35.9 96 80c0 31.1-22 59.6-56.1 72.7-21.2 8.1-39.2 22.3-52.1 40.9-13.1 19-19.9 41.8-19.9 64.9V620c0 4.4 3.6 8 8 8h48c4.4 0 8-3.6 8-8v-22.7a48.3 48.3 0 0130.9-44.8c59-22.7 97.1-74.7 97.1-132.5.1-39.3-17.1-76-48.3-103.3zM472 732a40 40 0 1080 0 40 40 0 10-80 0z"></path></svg></span>
                                    </div>
                                    <div class="working-check-time-meassure">
                                        <div class="check-time-start me-3">08:30</div>
                                        <div class="check-time-percent">
                                            <div class="progress-bar"></div>
                                        </div>
                                        <div class="check-time-end ms-3">18:00</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="working-work-log p-4">
                                    Worklog
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=" col-md-4">
                    <div class="part_3">
                        table OT
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require(__DIR__. '\\include\\libraryJs-Links.html')?>
    <script src="../../../admin/assets/js/header.js"></script> 
    <script src="../../../admin/assets/js/slideBar.js"></script>
</body>
