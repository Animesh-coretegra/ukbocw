<?php echo $this->extend('layout/masterLayout');
echo  $this->section('body-content'); ?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Survey Details</h4>
            <div class="page-title-right d-flex justify-content-around">
                <ol class="breadcrumb m-0 p-2">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">UKBOCWWB</a></li>
                    <li class="breadcrumb-item active"><a href="">Survey Details</a></li>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-8">
                        <p>Survey Id : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['survey_id']) ? $survey['survey_id'] : ""  ?></p>
                    </dd>

                    <dt class="col-sm-8">
                        <p>Name : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['fullName']) ? $survey['fullName'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Gender : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['Gender']) ? $survey['Gender'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>District : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['district']) ? $survey['district'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Age : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['Age']) ? $survey['Age'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Area : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['Area']) ? $survey['Area'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Marital Status : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['MaritalStatus']) ? $survey['MaritalStatus'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Phone Number : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['mobile_number']) ? $survey['mobile_number'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Education Qualification : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['Education']) ? $survey['Education'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Designation : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['designation']) ? $survey['designation'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Social Category : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['Social_category']) ? $survey['Social_category'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Religion : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['Religion']) ? $survey['Religion'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>State : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['State']) ? $survey['State'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>No Of Family Member : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <?php if (!empty($survey['family_member_details'])) {
                            $familyDetailArray = json_decode($survey['family_member_details']);
                            foreach ($familyDetailArray as $key => $value) {
                                $family[] = explode(",", $value);
                            }
                            echo '<p>' . sizeof($family) . '</p>';
                        }
                        ?>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Ration Card : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['Ration_Card']) ? $survey['Ration_Card'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Major Source Of Income : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['major_sources_of_your_family_income']) ? $survey['major_sources_of_your_family_income'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Monthly Family Income : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['Monthly_Family_Income']) ? $survey['Monthly_Family_Income'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Hospital Treatment : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['treatment']) ? $survey['treatment'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Land Possess : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['land_possess']) ? $survey['land_possess'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Stay : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['stay']) ? $survey['stay'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Material Of House : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['house_material']) ? $survey['house_material'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Is there any toilet in the house you live? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['have_washroom']) ? $survey['have_washroom'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Are you provided with basic amenities at the rented or employer provided house? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['basic_amenities']) ? $survey['basic_amenities'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>How long have you been the member of UKBOCWW Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['no_of_years_member']) ? $survey['no_of_years_member'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Have you faced any problem while registering or renewing the membership? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['face_problem_registration']) ? $survey['face_problem_registration'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>If Yes, what is it? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['face_problem_registration_other']) ? $survey['face_problem_registration_other'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Did you face any problem to produce 90 days working certificate? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['working_certificate']) ? $survey['working_certificate'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Do you think that the number of days to acquire the working certificate should be reduced? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['working_certificate_day_reduce']) ? $survey['working_certificate_day_reduce'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>How do you fill the forms? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['form_fill']) ? $survey['form_fill'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>How much does the CSC center charge you for application? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['application_charge']) ? $survey['application_charge'] : "0"  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Do you renew your membership regularly? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['renew_membership_regular']) ? $survey['renew_membership_regular'] : ""  ?></p>
                    </dd>

                    <dt class="col-sm-8">
                        <p>Not renew your membership regularly, why? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['renew_membership_regular_no']) ? $survey['renew_membership_regular_no'] : "---------"  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Are you aware about the schemes of UKBOCWWB? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['scheme_aware']) ? $survey['scheme_aware'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Where you got the information about the UKBOCWWB Schemes? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['know_about_scheme']) ? $survey['know_about_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Have you ever informed about the scheme by the UKBOCWWB board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['informed_about_scheme']) ? $survey['informed_about_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Are you aware about the <strong>Maternity Benefit scheme</strong> of UKBOCWWB? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_maternity_scheme']) ? $survey['aware_maternity_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Not aware about the Maternity Benefit scheme, why? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= isset($survey['aware_maternity_scheme_no']) && !empty($survey['aware_maternity_scheme_no']) ? $survey['aware_maternity_scheme_no'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Have you availed the benefits under the Maternity Benefit scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['availed_maternity_scheme']) ? $survey['availed_maternity_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>How is the fund utilized? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['fund_utilized_maternity_scheme_other']) ? $survey['fund_utilized_maternity_scheme_other'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Was the financial assistance helpful to meet the needs? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['financial_assistance_maternity_scheme']) ? $survey['financial_assistance_maternity_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the impacts of this scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['scheme_impact']) ? $survey['scheme_impact'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the challenges you faced to avail the scheme and your opinion, views, and suggestions about the scheme?: </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['challenges_face_opinion']) ? $survey['challenges_face_opinion'] : ""  ?></p>
                    </dd>


                    <dt class="col-sm-8">
                        <p>Are you aware about the <strong>60 Years pension scheme</strong> of UKBOCWWB?: </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_sixty_year_pension']) ? $survey['aware_sixty_year_pension'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Not Aware 60 Years pension scheme, Why?: </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_sixty_year_pension_no']) ? $survey['aware_sixty_year_pension_no'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Are you getting the Pension under the scheme?: </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['get_pension_under_scheme']) ? $survey['get_pension_under_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>If applied but not availed, why?: </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['pension_applied_but_not_received']) ? $survey['pension_applied_but_not_received'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>If yes, are you getting the Pension regularly under this scheme?: </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['get_pension_regular_under_scheme']) ? $survey['get_pension_regular_under_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Where do you utilize the fund?: </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['pension_fund_utilized_other']) ? $survey['pension_fund_utilized_other'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Was the financial assistance helpful to meet the needs?: </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['pension_fund_utilized']) ? $survey['pension_fund_utilized'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the impacts of this scheme?: </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['pension_scheme_impact']) ? $survey['pension_scheme_impact'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the challenges you faced to avail the scheme and your opinion, views, and suggestions about the scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['pension_scheme_challenge_faced']) ? $survey['pension_scheme_challenge_faced'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>The UKBOCW Welfare Board provides <span style="font-weight: bold;">Financial Assistance for Education</span> to the registered workers children. Are you aware about the Education Assistance?: </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_financial_assistance_education']) ? $survey['aware_financial_assistance_education'] : ""  ?></p>
                    </dd>


                    <dt class="col-sm-8">
                        <p>Not aware about Financial Assistance for Education,why? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_financial_assistance_education_no']) ? $survey['aware_financial_assistance_education_no'] : ""  ?></p>
                    </dd>

                    <dt class="col-sm-8">
                        <p>Have you got any financial assistance for your children’s education? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['get_financial_assistance_education']) ? $survey['get_financial_assistance_education'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>If availed, for which are the following: : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['availed_financial_assistance_education']) ? $survey['availed_financial_assistance_education'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>How many times you got the benefit of this scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['times_financial_assistance_education']) ? $survey['times_financial_assistance_education'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Where is the fund utilized? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['fund_utilized_financial_assistance_education_other']) ? $survey['fund_utilized_financial_assistance_education_other'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Was the financial assistance helpful to meet the needs? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['is_helpful_financial_assistance_education']) ? $survey['is_helpful_financial_assistance_education'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the impacts of this scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['financial_assistance_education_impact']) ? $survey['financial_assistance_education_impact'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the challenges you faced to avail the scheme and your opinion, views, and suggestions about the scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['financial_assistance_education_challenge_faced']) ? $survey['financial_assistance_education_challenge_faced'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>The UKBOCW Welfare Board gives assistance to Medical/ Health Insurance (Medical assistance
                            under Rashtriya Swasthya Bima Yojna) to the construction workers. Are you aware about it? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_health_insurance']) ? $survey['aware_health_insurance'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Not aware Medical/ Health Insurance, Why? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_health_insurance_no']) ? $survey['aware_health_insurance_no'] : ""  ?></p>
                    </dd>


                    <dt class="col-sm-8">
                        <p>Did you avail this scheme provided by the UKBOCWWB? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['availed_health_insurance']) ? $survey['availed_health_insurance'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the impacts of this scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['health_insurance_impact']) ? $survey['health_insurance_impact'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are challenges you faced to avail the scheme and your opinion, views, and suggestions about the scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['health_insurance_challenge_faced']) ? $survey['health_insurance_challenge_faced'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>The UK Building and other Construction Workers Welfare Board provide Home Loan. Are you
                            aware about it? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_home_loan']) ? $survey['aware_home_loan'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Not aware Home Loan, Why? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_home_loan_no']) ? $survey['aware_home_loan_no'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Did you get any assistance for the Purchase/ Built of House under Housing Scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['assistance_home_loan']) ? $survey['assistance_home_loan'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>If Yes, have you built/ purchased the house under Housing scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['built_house_under_home_loan']) ? $survey['built_house_under_home_loan'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Was the financial assistance helpful to meet the needs? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['meet_the_need_home_loan']) ? $survey['meet_the_need_home_loan'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Does this scheme being loan assistance deter you from availing it? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['availing_home_loan']) ? $survey['availing_home_loan'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the impacts of this scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['home_loan_impact']) ? $survey['home_loan_impact'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the challenges you faced to avail the scheme and your opinion, views, and suggestions about the scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['home_loan_challenge_faced']) ? $survey['home_loan_challenge_faced'] : ""  ?></p>
                    </dd>


                    <dt class="col-sm-8">
                        <p>Are you aware about Disability Pension Scheme of UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_disability_pension_scheme']) ? $survey['aware_disability_pension_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Not aware Disability Pension Scheme, why? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_disability_pension_scheme_no']) ? $survey['aware_disability_pension_scheme_no'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Have you got benefits of the scheme from UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['assistance_disability_pension_scheme']) ? $survey['assistance_disability_pension_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Was the financial assistance helpful to meet the needs? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['meet_disability_pension_scheme']) ? $survey['meet_disability_pension_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the impacts of this scheme on your condition? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['disability_pension_scheme_impact']) ? $survey['disability_pension_scheme_impact'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the challenges you faced to avail the scheme and your opinion, views, and suggestions about the scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['disability_pension_scheme_faced']) ? $survey['disability_pension_scheme_faced'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Are you aware about Financial Assistance due to Death (Rs. 20,000 for Natural Death & Rs.
                            50,000 for Accidental death of registered construction worker) by UKBOCWWB? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_death_financial_help']) ? $survey['aware_death_financial_help'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Not aware Financial Assistance due to Death, why? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_death_financial_help_no']) ? $survey['aware_death_financial_help_no'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Have you availed the benefits under this scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['availed_death_financial_help']) ? $survey['availed_death_financial_help'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>How many times you availed the benefits? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['times_availed_death_financial_help']) ? $survey['times_availed_death_financial_help'] : ""  ?></p>
                    </dd>

                    <dt class="col-sm-8">
                        <p>Was the financial assistance helpful to meet the needs? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['meet_need_death_financial_help']) ? $survey['meet_need_death_financial_help'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the impacts of this scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['death_financial_help_impact']) ? $survey['death_financial_help_impact'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the challenges you faced to avail the scheme and your opinion, views, and suggestions about the scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['death_financial_help_challenge_faced']) ? $survey['death_financial_help_challenge_faced'] : ""  ?></p>
                    </dd>

                    <dt class="col-sm-8">
                        <p>The UKBOCWWB provides Funeral Assistance (Rs 10,000). Are you aware about the Assistance
                            Scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_funeral_assistance']) ? $survey['aware_funeral_assistance'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Does the lengthy process and the benefit be given only once a year deter you from availing the benefit? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['availed_funeral_assistance']) ? $survey['availed_funeral_assistance'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the impacts of this scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['death_financial_help_impacts']) ? $survey['death_financial_help_impacts'] : ""  ?></p>
                    </dd>


                    <dt class="col-sm-8">
                        <p>Are you aware about Tool Kit Assistance by UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_tool_kit']) ? $survey['aware_tool_kit'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Not aware Tool Kit Assistance, why? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_tool_kit_no']) ? $survey['aware_tool_kit_no'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Have you got benefits of the scheme from UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['availed_tool_kit']) ? $survey['availed_tool_kit'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Was the financial assistance helpful to meet the needs? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['meet_need_tool_kit']) ? $survey['meet_need_tool_kit'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the impacts of this scheme on your condition? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['tool_kit_impact']) ? $survey['tool_kit_impact'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the challenges you faced to avail the scheme and your opinion, views, and suggestions about the scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['tool_kit_challenge_faced']) ? $survey['tool_kit_challenge_faced'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Are you aware about Bicycle Scheme (Construction workers of Plain area registered workers) by UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_bicycle_scheme']) ? $survey['aware_bicycle_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Not aware Bicycle Scheme,why? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_bicycle_scheme_no']) ? $survey['aware_bicycle_scheme_no'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Have you got benefits of the scheme from UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['availed_bicycle_scheme']) ? $survey['availed_bicycle_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the impacts of this scheme on your condition? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['bicycle_scheme_impact']) ? $survey['bicycle_scheme_impact'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Are you aware about Sewing Machine Scheme (Sewing machine to construction workers of
                            mountainous areas or their dependents) by UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_sewing_machine_scheme']) ? $survey['aware_sewing_machine_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Not aware Sewing Machine Scheme, why? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_sewing_machine_scheme_no']) ? $survey['aware_sewing_machine_scheme_no'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Have you got benefits of the scheme from UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['avail_sewing_machine_scheme']) ? $survey['avail_sewing_machine_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the impacts of this scheme on your condition? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['sewing_machine_scheme_impact']) ? $survey['sewing_machine_scheme_impact'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the challenges you faced to avail the scheme and your opinion, views, and suggestions about the scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_sewing_machine_scheme_faced']) ? $survey['aware_sewing_machine_scheme_faced'] : ""  ?></p>
                    </dd>

                    <dt class="col-sm-8">
                        <p>Are you aware about Sanitary Napkin Scheme (Sanitary napkins to the registered female workers or the daughters of registered workers) by UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_sanitary_napkins_scheme']) ? $survey['aware_sanitary_napkins_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Not aware Sanitary Napkin Scheme,Why? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_sanitary_napkins_scheme_no']) ? $survey['aware_sanitary_napkins_scheme_no'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Have you got benefits of the scheme from UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['avail_sanitary_napkins_scheme']) ? $survey['avail_sanitary_napkins_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Was the assistance helpful to meet the needs? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['needs_sanitary_napkins_scheme']) ? $survey['needs_sanitary_napkins_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the impacts of this scheme on your condition? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['sanitary_napkins_scheme_impact']) ? $survey['sanitary_napkins_scheme_impact'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the challenges you faced to avail the scheme and your opinion, views, and suggestions about the scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['sanitary_napkins_scheme_faced']) ? $survey['sanitary_napkins_scheme_faced'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Are you aware about Skill Training (collaboration with NIESBUD )to train & form SHG groups of female members of registered workers under UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_skill_training_scheme']) ? $survey['aware_skill_training_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Not aware Skill Training,why? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_skill_training_scheme_no']) ? $survey['aware_skill_training_scheme_no'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Have you got benefits of the scheme from UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['avail_skill_training_scheme']) ? $survey['avail_skill_training_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Was the Skill Training helpful? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['helpful_skill_training_scheme']) ? $survey['helpful_skill_training_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the impacts of this scheme on your condition? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['skill_training_scheme_impact']) ? $survey['skill_training_scheme_impact'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the challenges you faced to avail the scheme and your opinion, views, and suggestions about the scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['skill_training_scheme_faced']) ? $survey['skill_training_scheme_faced'] : ""  ?></p>
                    </dd>


                    <dt class="col-sm-8">
                        <p>Are you aware about Solar Light Scheme (once in lifetime) by UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_solar_light_scheme']) ? $survey['aware_solar_light_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Not aware Solar Light Scheme,why? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_solar_light_scheme_no']) ? $survey['aware_solar_light_scheme_no'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Have you got benefits of the scheme from UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['avail_solar_light_scheme']) ? $survey['avail_solar_light_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Was the Scheme helpful to meet the needs? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['helpful_solar_light_scheme']) ? $survey['helpful_solar_light_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the impacts of this scheme on your condition? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['solar_light_scheme_impact']) ? $survey['solar_light_scheme_impact'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the challenges you faced to avail the scheme and your opinion, views, and suggestions about the scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['solar_light_scheme_faced']) ? $survey['solar_light_scheme_faced'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Are you aware about Umbrella Scheme (once in a lifetime) by UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_Umbrella_scheme']) ? $survey['aware_Umbrella_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Not aware Umbrella Scheme, why? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_Umbrella_scheme_no']) ? $survey['aware_Umbrella_scheme_no'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Have you got benefits of the scheme from UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['avail_Umbrella_scheme']) ? $survey['avail_Umbrella_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the impacts of this scheme on your condition? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['Umbrella_scheme_impact']) ? $survey['Umbrella_scheme_impact'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the challenges you faced to avail the scheme and your opinion, views, and suggestions about the scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['skill_training_scheme_faced']) ? $survey['skill_training_scheme_faced'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Are you aware about Skill Up gradation by UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_skill_up_scheme']) ? $survey['aware_skill_up_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Not aware Skill Up gradation,why? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_skill_up_scheme_no']) ? $survey['aware_skill_up_scheme_no'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Have you got benefits of the scheme from UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['avail_skill_up_scheme']) ? $survey['avail_skill_up_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Was the assistance helpful to meet the needs? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['helpful_skill_up_scheme']) ? $survey['helpful_skill_up_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the impacts of this scheme on your condition? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['skill_up_impact']) ? $survey['skill_up_impact'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the challenges you faced to avail the scheme and your opinion, views, and suggestions about the scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['skill_up_scheme_faced']) ? $survey['skill_up_scheme_faced'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Are you aware about Construction of Toilets (Rs. 12,000 for construction of toilets to registered eligible construction workers) by UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_washroom_construction_scheme']) ? $survey['aware_washroom_construction_scheme'] : ""  ?></p>
                    </dd>


                    <dt class="col-sm-8">
                        <p>Not aware Construction of Toilets,Why? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['aware_washroom_construction_scheme']) ? $survey['aware_washroom_construction_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Have you got benefits of the scheme from UKBOCW Welfare Board? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['avail_washroom_construction_scheme']) ? $survey['avail_washroom_construction_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>Was the financial assistance helpful to meet the needs? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['helpful_washroom_construction_scheme']) ? $survey['helpful_washroom_construction_scheme'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the impacts of this scheme on your condition? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['washroom_construction_impact']) ? $survey['washroom_construction_impact'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-8">
                        <p>What are the challenges you faced to avail the scheme and your opinion, views, and suggestions about the scheme? : </p>
                    </dt>
                    <dd class="col-sm-4">
                        <p><?= !empty($survey['washroom_construction_challenge_face']) ? $survey['washroom_construction_challenge_face'] : ""  ?></p>
                    </dd>
                    <dt class="col-sm-6">
                        <p>Image : </p>
                    </dt>
                    <dd class="col-sm-6">
                        <?php
                        if (!empty($survey['photo'])) { ?>
                            <img src="<?= $survey['photo'] ?>" alt="" srcset=""  height="500">
                        <?php } else { ?>

                        <?php  }
                        ?>
                    </dd>
                    <dt class="col-sm-6">
                        <p>Identity Proof : </p>
                    </dt>
                    <dd class="col-sm-6">
                        <?php
                        if (!empty($survey['identityProof'])) { ?>
                            <img src="<?= $survey['identityProof'] ?>" alt="" srcset=""  height="500">
                        <?php } else { ?>

                        <?php  }
                        ?>
                    </dd>

                </dl>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>