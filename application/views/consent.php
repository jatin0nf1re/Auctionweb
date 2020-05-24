

<h2 class="text-main text-center my-3">Consent Letter</h2>

<div class="d-flex flex-column align-items-center w-100 h-65">
    <div class="w-90 bg-light h-100 rounded shadow overflow-auto p-3 mb-3">
        <h6 class="font-weight-bold">Introduction</h6>
        <p class="text-justify">
            This study attempts to assess school climate of all public schools of Gujarat. School climate is broadly defined as the “norms, values and expectations that support people feeling socially, emotionally and physically safe.
            The study has brought in desirable outcomes in Western schools but literature about this is non-existence in India.
        </p>
        <h6 class="font-weight-bold">Procedures</h6>
        <p class="text-justify">
        Computer-based online surveys will be administered in schools using an online platform,  Qualtrics. In some cases, paper-pencil surveys can be administered as well if the school does not have required IT infrastructure.  Schools have to login using School Code and password  and they will be given one week of time-window to administer surveys to all respondents (teacher, students, and principal). 
        </p>
        
        <h6 class="font-weight-bold">Risks/Discomforts</h6>
        <p class="text-justify">
        Risks are minimal for involvement in this study. However, you may feel emotionally uneasy when asked to make judgments based on the situations stimulated. 
        </p>
        
        <h6 class="font-weight-bold">Benefits</h6>
        <p class="text-justify">
        Schools will be provided percentile rank based on their composite school climate score. On the basis of score, teachers will be provided with the relevant modules in the domains a particular school lags behind. It is hoped that through your participation, researchers will learn more about socio-ecological factors, and how they are interrelated.
        </p>

        <h6 class="font-weight-bold">Confidentiality</h6>
        <p class="text-justify">
        All data obtained from participants will be kept confidential and will only be reported in an aggregate format (by reporting only combined results and never reporting inpidual ones). All questionnaires will be concealed, and no one other than then primary investigator and assistant researches listed below will have access to them. The data collected will be stored in Qualtrics-secure database until it has been deleted by the primary investigator.
        </p>

        <h6 class="font-weight-bold">Participation</h6>
        <p class="text-justify">
        Participation in this research study is completely voluntary. You have the right to withdraw at anytime or refuse to participate entirely without jeopardy to your academic status.
        </p>
        
        <h6 class="font-weight-bold">Questions about the Research</h6>
        <p class="text-justify">
        If you have questions regarding this study, you may contact (principal investigator), at 555-555-5555, principleinvestigator@fakeemail555.com or (assistant 1) 666-666-6666, assistant1@fakeemail555.com, (assistant 2) 777-777-7777, assistant2@fakeemail555.com.
        </p>

    </div>
    <div class="w-90 m-3">
        <form class="w-100 d-flex flex-wrap justify-content-between my-2" method="post" action="<?php echo base_url(); ?>private_area/hasAgreed">
            <div class="text-large font-weight-bold col-md-6 col-sm-12">
                <input type="checkbox" name="user_agreed"/>
                <span>I hereby agree to all the terms and conditions provided above</span>
            </div>
            <input type="submit" name="done" value="Done" class="if-checked btn text-main round custom-btn my-2" disabled="true"/>
        </form>
    </div>
</div>

<script>
        console.log("hmm");
        $('input[type="checkbox"]').click(function(){
            if($(this).is(":checked")){
                $('input.if-checked').attr('disabled',false);
            }
            else if($(this).is(":not(:checked)")){
                $('input.if-checked').attr('disabled',true);
            }
        });
</script>