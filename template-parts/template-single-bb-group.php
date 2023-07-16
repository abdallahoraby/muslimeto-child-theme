<div class="tabs">

    <!-- start tab content-->
    <input type="radio" name="tabs" id="dashboard" checked="checked">
    <label for="dashboard">
        <i class="fas fa-tachometer-alt"></i>
        Dashboard
    </label>
    <div class="tab activity">

        one

    </div>
    <!-- end tab content-->

    <!-- start tab content-->
    <input type="radio" name="tabs" id="class">
    <label for="class">
        <i class="fas fa-tachometer-alt"></i>
        Class Routine
    </label>
    <div class="tab">
        <div class="col-md-12">
            two
        </div>
    </div>
    <!-- end tab content-->

</div>


<style>
    /**
 * Tabs
 */
    .tabs {
        display: flex;
        flex-wrap: wrap;
    }

    .tabs label {
        order: 1;
        display: block;
        padding: 1rem 2rem;
        margin-right: 0.2rem;
        cursor: pointer;
        background: #90CAF9;
        font-weight: bold;
        transition: background ease 0.2s;
    }

    .tabs .tab {
        order: 99;
        flex-grow: 1;
        width: 100%;
        display: none;
        padding: 1rem;
        background: #fff;
    }

    .tabs input[type=radio] {
        display: none;
    }

    .tabs input[type=radio]:checked + label {
        background: #fff;
    }

    .tabs input[type=radio]:checked + label + .tab {
        display: block;
    }

    @media (max-width: 45em) {
        .tabs .tab,
        .tabs label {
            order: initial;
        }

        .tabs label {
            width: 100%;
            margin-right: 0;
            margin-top: 0.2rem;
        }
    }
    /**
     * Generic Styling
    */
    body {
        background: #eee;
        min-height: 100vh;
        box-sizing: border-box;
        padding-top: 10vh;
        font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
        font-weight: 300;
        line-height: 1.5;
        max-width: 60rem;
        margin: 0 auto;
        font-size: 112%;
    }
</style>