<script type="text/javascript">
    mixpanel.track("Add Vacancy");
</script>

<div id="subheader">
    <div class="inner">
        <div class="container">
            <h1><?php echo $title; ?></h1>
        </div>
    </div>
</div>

<div id="subpage">
    <div class="container">

        <form method="POST" name="frmAddVacancy">
            <div class="row">

                <div class="span12">
                    
                    <label>Name</labe>
                    <input type="text" name="name" />
                    
                    <label>Description</labe>
                    <textarea type="text" name="description"></textarea>
                    
                    <input type="submit" name="submit" value="Add" />

                </div>
            </div>
        </form>
    </div>
</div>