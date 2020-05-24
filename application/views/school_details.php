<div class="container">
<h2 class="text-main text-center my-3 padding-2">Fill In The Required Details</h2>
<form class="d-flex w-100 flex-wrap" method="post" action="<?php echo base_url(); ?>private_area/insert_school_details">
    <div class="form-group col-md-6 col-sm-12 p-2">
        <label class="font-weight-bold">School Name</label>
        <input type="text" class="form-control custom-input shadow m-2" name="school_name" placeholder="Enter here"/>
    </div>
    <!-- <div class="form-group col-md-6 col-sm-12 p-2">
        <label class="font-weight-bold">Number of teachers in your school</label>
        <input type="number" class="form-control custom-input shadow m-2" name="teacher-strength" placeholder="Enter here"/>
    </div> -->
    <div class="form-group col-md-6 col-sm-12 p-2">
            <label class="font-weight-bold">District</label>
            <select name="school_district" class="form-control shadow m-2">
                <option value="Ahmedabad">Ahmedabad</option>
                <option value="Amreli">Amreli</option>
                <option value="Anand">Anand</option>
                <option value="Aravalli">Aravalli</option>
                <option value="Banaskantha">Banaskantha</option>
                <option value="Bharuch">Bharuch</option>
                <option value="Bhavnagar">Bhavnagar</option>
                <option value="Botad">Botad</option>
                <option value="Chhota Udaipur">Chhota Udaipur</option>
                <option value="Dahod">Dahod</option>
                <option value="Dang">Dang</option>
                <option value="Devbhoomi Dwarka">Devbhoomi Dwarka</option>
                <option value="Gandhinagar">Gandhinagar</option>
                <option value="Gir Somnath">GirSomnath</option>
                <option value="Jamnagar">Jamnagar</option>
                <option value="Junagadh">Junagadh</option>
                <option value="Kutch">Kutch</option>
                <option value="Kheda">Kheda</option>
                <option value="Mahisagar">Mahisagar</option>
                <option value="Mehsana">Mehsana</option>
                <option value="Morbi">Morbi</option>
                <option value="Narmada">Narmada</option>
                <option value="Navsari">Navsari</option>
                <option value="Panchmahal">Panchmahal</option>
                <option value="Patan">Patan</option>
                <option value="Porbandar">Porbandar</option>
                <option value="Rajkot">Rajkot</option>
                <option value="Sabarkantha">Sabarkantha</option>
                <option value="Surat">Surat</option>
                <option value="Surendranagar">Surendranagar</option>
                <option value="Tapi">Tapi</option>
                <option value="Vadodara">Vadodara</option>
                <option value="Valsad">Valsad</option>
            </select>
        </div>
        <div class="form-group col-md-6 col-sm-12 p-2">
            <label class="font-weight-bold">Name of Village/Town/City</label>
            <input type="text" class="form-control custom-input shadow m-2" name="school_town" placeholder="Enter here"/>
        </div>
        <div class="form-group col-md-6 col-sm-12 p-2">
            <label class="font-weight-bold">Gender</label>
            <select name="gender" class="form-control shadow m-2">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Female">Other</option>
            </select>
        </div>
        <div class="form-group col-md-6 col-sm-12 p-2">
            <label class="font-weight-bold">Caste</label>
            <select name="caste" class="form-control shadow m-2">
                <option value="Gen">General</option>
                <option value="SEBC">SEBC(socially and educationally backward class)</option>
                <option value="SC">SC(Scheduled Caste)</option>
                <option value="ST">ST(Scheduled Tribe)</option>
                <option value="OBC">OBC(Other Backward Caste)</option>
                <option value="No">Don't want to specify</option>
            </select>
        </div>
        <div class="form-group col-md-6 col-sm-12 p-2">
            <label class="font-weight-bold">Religion</label>
            <select name="religion" class="form-control shadow m-2">
                <option value="Buddhist">Buddhist</option>
                <option value="Christian">Christian</option>
                <option value="Hindu">Hindu</option>
                <option value="Jain">Jain</option>
                <option value="Muslim">Muslim</option>
                <option value="Sikh">Sikh</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="form-group col-md-6 col-sm-12 p-2">
            <label class="font-weight-bold">Years of Teaching Experience</label>
            <input type="number" class="form-control custom-input shadow m-2" name="teaching_experience" placeholder="Enter here"/>
        </div>
        <div class="form-group col-md-6 col-sm-12 p-2">
            <label class="font-weight-bold">Age</label>
            <input type="number" class="form-control custom-input shadow m-2" name="principal_age" placeholder="Enter here"/>
        </div>
        <div class="form-group col-md-6 col-sm-12 p-2">
        <label class="font-weight-bold">Number of teachers in your school</label>
        <input type="number" class="form-control custom-input shadow m-2" name="teacher-strength" placeholder="Enter here"/>
    </div>
    <div class="text-small m-3 col-md-12 text-center">
        <span class="text-main">Note -</span>
        <span>The number entered must be accurate as only the same number of forms will be generated</span>
    </div>
    <div class="d-flex justify-content-center form-group col-md-12">
        <input type="submit" class="btn text-main m-auto round custom-btn" name="Submit" />
    </div>
</form>


</div>