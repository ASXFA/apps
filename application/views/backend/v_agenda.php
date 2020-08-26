<!-- PAGE CONTAINER-->
<div class="page-container">
    <!-- HEADER DESKTOP-->
    <?php $this->load->view('backend/include/header_dekstop') ?>
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="au-card">
                            <h2 class="display-5 m-b-30">Agenda <span class="float-right"><a href="" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Agenda</a></span> </h2>
                            <div id="calendar" class="m-b-30"></div>
                            <!-- <h2 class="display-5 m-b-30">List Agenda</h2>
                            <div class="card m-b-10">
                                <div class="card-header bg-primary">
                                    <strong class="card-title text-light">26 Agustus 2020 - Special Conference</strong>
                                </div>
                                <div class="card-body text-white bg-primary">
                                    <p class="card-text text-light">Some quick example text to build on the card title and make up the bulk of the card's
                                        content.
                                    </p>
                                </div>
                            </div>
                            <div class="card m-b-10">
                                <div class="card-header bg-primary">
                                    <strong class="card-title text-light">28 Agustus 2020 - Doctor Appt</strong>
                                </div>
                                <div class="card-body text-white bg-primary">
                                    <p class="card-text text-light">Some quick example text to build on the card title and make up the bulk of the card's
                                        content.
                                    </p>
                                </div>
                            </div> -->
                        </div>
                    </div><!-- .col -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
</div>
<div class="row">
    <div class="col-md-12">
        <div class="copyright">
            <p>Copyright © 2020</p>
        </div>
    </div>
</div>
    <!-- Jquery JS-->
    <script src="<?= base_url('assets/backend/') ?>vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?= base_url('assets/backend/') ?>vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="<?= base_url('assets/backend/') ?>vendor/slick/slick.min.js">
    </script>
    <script src="<?= base_url('assets/backend/') ?>vendor/wow/wow.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>vendor/animsition/animsition.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?= base_url('assets/backend/') ?>vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?= base_url('assets/backend/') ?>vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?= base_url('assets/backend/') ?>vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>vendor/select2/select2.min.js"></script>

    <!-- full calendar requires moment along jquery which is included above -->
    <script src="<?= base_url('assets/backend/') ?>vendor/fullcalendar-3.10.0/lib/moment.min.js"></script>
    <script src="<?= base_url('assets/backend/') ?>vendor/fullcalendar-3.10.0/fullcalendar.js"></script>

    <!-- Main JS-->
    <script src="<?= base_url('assets/backend/') ?>js/main.js"></script>
<script type="text/javascript">
$(function() {
    // for now, there is something adding a click handler to 'a'
    var tues = moment().day(2).hour(19);

    // build trival night events for example data
    var events = [
        {
            title: "Special Conference",
            start: moment().format('YYYY-MM-DD'),
            url: '#'
        },
        {
            title: "Doctor Appt",
            start: moment().hour(9).add(2, 'days').toISOString(),
            url: '#'
        }
    ];

    var trivia_nights = []

    for(var i = 1; i <= 4; i++) {
        var n = tues.clone().add(i, 'weeks');
        console.log("isoString: " + n.toISOString());
        trivia_nights.push({
            title: 'Trival Night @ Pub XYZ',
            start: n.toISOString(),
            allDay: false,
            url: '#'
        });
    }

    // setup a few events
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,listWeek'
        },
        events: events
    });
});
</script>
