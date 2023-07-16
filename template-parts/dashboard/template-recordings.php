<style>

body{
  overflow: hidden!important;
}

.elementor-shortcode{
    display: flex;
    height: 85vh;
    overflow: hidden;
}
.elementor-section .elementor-container{
  width: 100%!important;
  max-width: 100%!important;
}
 body.bb-buddypanel.buddypanel-open:not(.elementor-template-canvas) .elementor-section-stretched[style*=width]{
   box-shadow: none!important;
 }
 .elementor-section.elementor-section-boxed>.elementor-container{
   padding-left: 0!important;
   padding-right: 0!important
 }
.elementor-column-wrap{justify-content:center;}
body.bb-buddypanel.buddypanel-open:not(.elementor-template-canvas) .elementor-section-full_width[style*=width], body.bb-buddypanel.buddypanel-open:not(.elementor-template-canvas) .elementor-section-stretched[style*=width]{
    width: 100%!important;
    left: 0!important;
    max-width: 100%!important;
    position: relative;
    padding: 20px 0;
    margin-top: 0!important
}
.elementor-widget-container{
  display: flex;
  justify-content: space-between;
  align-items: start;
  overflow: hidden;
  max-height: calc(100vh - 5rem)!important;
  margin-top: 0rem;
  margin-bottom: 1rem
}
.post-15237.page.type-page.status-publish.hentry{
    display: flex;
    justify-content: space-between;
    align-items: start;
    overflow: hidden;
    max-height: calc(100vh - 5rem)!important;
    margin-top: 5rem;
    margin-bottom: 1rem
}
.entry-content{
    display: flex;
    justify-content: space-between;
    align-items: start;
    overflow: hidden;
    max-height: 100vh;
}

.teacher_sel.load_sel{
    width: 8vw;
    overflow: hidden;
    text-overflow: ellipsis;
    position: absolute;
    left: 9vw;
    height: 31px;
    top: 10px;
    font-size: .56rem;
    z-index: 99!important
}

.month_sel{
  position: absolute;
    z-index: 99;
    top: 10px;
    height: 31px;
    left: 18vw;
    font-size: .56rem;
    width:8vw;
}
.ta_div{
    height: 85vh;
    background: #fff;
    padding: 10px 5px 5px 10px;
    width: 50vw!important;
    overflow: hidden;

}
.dataTable::-webkit-scrollbar,.madia_popup::-webkit-scrollbar {
   width: 4px;
   height: 4px
}

.dataTable::-webkit-scrollbar-track,.madia_popup::-webkit-scrollbar-track {
 box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}

.dataTable::-webkit-scrollbar-thumb,.madia_popup::-webkit-scrollbar-thumb {
 background-color: #475F7B;
}
.site-content{
  background: #edefef!important;
  min-height: 100vh!important;
}

.dataTable{
      background: #fff;
      padding: 0!important;
      padding-top: 0!important;
      max-height: 62vh;
      height: 62vh;
      margin-left: 0!important;
      border-radius: 0!important;
      width: 100%!important;
      margin-top: 28px;
      table-layout: fixed;
      min-width: 100%;
      overflow-x: hidden!important;
      overflow-y: auto;
      display: block;
}

.dataTable thead tr{
    position: sticky!important;
    top: 0;
    background: #fff;
    z-index: 99;
}
.dataTable tbody tr{
    cursor: pointer;
    transition: 200ms linear
}

.dataTable th,.dataTable td{
    font-size: .54rem!important;
    color: var(--main-color)!important;
    vertical-align: baseline;
    line-height: 12px!important;
    white-space: nowrap;
}
.dataTable td{
  border-bottom: 1px solid #edefef!important
}
table.dataTable tbody th, table.dataTable tbody td{
  width: 13.5%;
}
.widget-area.sm-grid-1-1{
  display: none;
}
.dataTables_wrapper .dataTables_length{
  width: 8vw!important;
  margin-bottom: 15px!important
}
.dataTables_wrapper .dataTables_length select{
    width: 50px;
    border: 1px solid #eee!important;
    margin: 0!important;
    border-radius: 6px!important;
}
.dataTables_wrapper .dataTables_filter{
  width: 31%!important;
}
.dataTables_wrapper .dataTables_filter input{
  border: 1px solid #eee!important;
  height: 31px;
  border-radius: 6px!important;
  margin: 0!important;
  width: 130px;
}
.dataTables_paginate.paging_simple_numbers{
    background: #fff;
    box-shadow: 0 0 10px rgb(0 0 0 / 10%);
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 5px 10px;
    position: sticky;
    bottom: 0;
    width: 100%;
}
.dataTables_filter{
  margin-top: 0px;
  max-width: 40%;
  align-self: end;
}
.dataTables_paginate.paging_simple_numbers{
  margin-top: 10px
}
.dataTables_paginate.paging_simple_numbers a,.dataTables_length *,.dataTables_filter *{
  font-size: .56rem!important;
}
.dataTables_wrapper .dataTables_paginate .paginate_button.current{
    border: 0!important;
    background: var(--blue);
    color: #fff!important;
}
.table:not(.table-dark) thead:not(.table-dark) th{
  border-bottom: 0!important;
}
.dataTables_info{font-size: .5rem!important}
td.meeting_url{
  color: var(--blue)!important;
}
th.meeting_type{
  width: 30px!important
}
td.type_td,td.meeting_media{
  text-align: center;
}
td.type_td span,td.meeting_media a{
  justify-content: center;
  align-items: center;
  width: 25px;
  height: 25px;
  border-radius: 50%;
  display: inline-flex;
}
td.type_td span i,td.meeting_media a i{
  font-size: .9rem!important;
  color: inherit!important;
}
td.type_td.audio_only span,td.meeting_media.audio_only a{
  background-color: #e5edfc !important;
    color: #5a8dee !important;
}
td.type_td.shared_screen_with_speaker_view span,td.meeting_media a{
  background-color: #d6f7fa !important;
    color: #00cfdd !important;
}
/* td.type_td.shared_screen_with_gallery_view span,td.meeting_media.shared_screen_with_gallery_view a{
    background-color: #dff9ec !important;
    color: #39da8a !important;
} */
/* popup style */
.madia_popup{
    background: #fff;
    width: 48vw;
    min-width: 48vw;
    padding: 0px;
    height: 85vh;
    border-left: 1px solid #eee;
    overflow-y: scroll;
    overflow-x: hidden;
}
section{
  box-shadow: 0 0 10px rgb(0 0 0 / 10%);
    padding: 10px 0;
    margin-bottom: 1px;
    height: 50vh
}
section:nth-child(2){
  box-shadow: none!important;
}
.ginput_container{
  padding: 0px 28px;
}
section:first-child{
  height: 36vh!important;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
}
.madia_popup_close{
  position: absolute;
    right: 5px;
    padding: 0;
    height: 30px;
    width: 30px;
    border-radius: 50%;
    background: var(--blue);
    border: 0;
    transition: 200ms linear;
    justify-content: center;
    align-items: center;
}
.madia_popup_close:hover{
  background: var(--blue)!important;
  transform: translateX(-3px);
}
.madia_popup_close i{
    color: #fff;
    font-size: 1rem!important;
}
.media-container{
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 30vh;
}
.media_view{
  width: auto!important;
  height: 28vh;
  margin-top: 5px;
  min-width: 50%;
}
h3.media_host_name{
    font-size: .7rem!important;
    color:var(--main-color);
    display: flex;
    justify-content: start;
    align-items: center;
    margin-bottom: 0px!important;
    white-space: nowrap;
}
h3.media_host_name span{
  font-size: .7rem!important;
  color:var(--main-color)
}
h3.media_host_name i{
  background: #5a8dee;
  width: 20px;
  height: 20px;
  border-radius: 50%;
  display: inline-flex;
  justify-content: center;
  align-items: center;
  color: #fff;
  font-size: 1.1rem;
  margin-right: 5px;
}
.media_tr.active{
  background: rgba(0,162,232,5%)!important;
}
table.dataTable tbody .media_tr.active th:first-child{
  border-left: 3px solid var(--blue)!important;
}
.hidden_td{
  display: none;
}
.media_view[type='audio_only']{
  height: 60px;
}
[for="playing_audio"]{
  display: none;
}

#search1 select{
  height: 31px!important;
  position: absolute;
  top: 10px;
  left: 9vw;
  width: 8vw;
  overflow: hidden;
  text-overflow: ellipsis;
  font-size: .56rem;
  z-index: 99;
}
.media_host_container{
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0 28px;
}
.media_host_container h5{
  font-size: .6rem;
  margin-bottom: 0px!important;
  white-space: nowrap;
}
.media_host_info{
    margin-bottom: 0!important;
    font-size: .7rem!important;
    margin-left: 25px!important;
}
div#field_37_14{
    display: flex;
    gap: 30px;
    box-shadow: 0 0 10px rgb(0 0 0 / 16%);
    margin-bottom: 10px;
    padding:5px;
    margin-top: 0!important;
}
td.gsurvey-likert-row-label{
  padding: 2px!important;
    font-size: .54rem!important;
    white-space: nowrap!important;
    color: var(--main-color);
    font-weight: normal!important;
    text-align:left!important
}


.gform_wrapper form input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]){
  height: 31px
}
.gform_body.gform-body{
  padding: 0!important;
}
#field_37_14,#field_37_11{
  margin-top: 5px!important
}
.gform_wrapper.gravity-theme .gform_fields{
  grid-row-gap: 0px!important;
}
.gform_wrapper form .top_label .gfield_label{
    font-size: .56rem!important;
    font-weight: 600;
    margin-bottom: 0!important;
    line-height: 12px!important;
    display: flex;
    justify-content: center;
    align-items: center;
    white-space: nowrap;
}
.gsurvey-likert{
  margin-bottom: 0!important;
}
#field_37_21{
  display: none;
}
table.gsurvey-likert{
  table-layout: auto!important;
  box-shadow: 0 0 10px rgb(0 0 0 / 10%)!important;
  margin-top: 5px!important;
  border-radius: 0!important;
  min-width: 250px;
}
table.gsurvey-likert tr{
  border-bottom: 1px solid #eee!important;
}
table.gsurvey-likert th.gsurvey-likert-choice-label{
  line-height: 7px!important;
  padding: 4px!important;
  font-size: .5rem;
  overflow: hidden;
  width: 20px!important;
  text-overflow: ellipsis;
  white-space: nowrap;
  max-width: 20px!important;
  font-weight: normal;
}
table.gsurvey-likert td.gsurvey-likert-row-label,
table.gsurvey-likert tr:nth-child(odd) td.gsurvey-likert-row-label{
  background: transparent!important;
  width: 70px;
  max-width: 70px;
  padding-left: 5px!important;
}
/* table.gsurvey-likert th,table.gsurvey-likert td{
  width: 30px!important;
  max-width: 30px!important
} */
.ginput_container.gsurvey-rating-wrapper{
  width: 100%!important;
  min-width: 100%;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 0!important;
}
.gform_wrapper .gform_validation_errors {
    border: 0!important;
    border-radius: 0!important;
    box-shadow: 0 0 2px rgb(0 0 0 / 16%)!important;
    background-color: #ffe5e5 !important;
    color: #ff5b5c !important;
    margin-top: 0!important;
    padding: 5px 30px!important
}
.gform_wrapper .gform_validation_errors>h2 .gform-icon{
    color: #ff5b5c !important;
}
div#input_37_14{
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 65%;
    flex-direction: row-reverse;
}
.gsurvey-rating:not(:checked)>label{
  margin-bottom: 0!important;
}
div#gform_fields_37{
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
}
div#field_37_14 {
    width: 100%;
    margin-left: 28px!important;
    margin-left: 28px!important;
    width: calc(100% - 56px)!important;
}
.gfield.field_sublabel_below{
  margin-top: 0!important;
}
.gform_wrapper.gravity-theme .gfield.gfield--width-quarter{
  display: none!important;
}
.gform_wrapper.gravity-theme .gform_footer{
  padding: 5px 0!important;
}
div#field_37_11{
    width: 46%!important;
    display: flex;
    flex-direction: column;
    justify-content: start;
    margin-top: 0!important;
}
div#field_37_23{
  width: 50%!important;
  display: flex;
  flex-direction: column;
  justify-content: start;
  min-width: 300px!important;
}
.ginput_container.ginput_container_textarea{
  display: none;
}
input#gform_submit_button_37 {
    border-radius: 0!important;
    border: 0!important;
    background: var(--blue)!important;
    margin-bottom: 0!important;
    transition: 200ms linear;
    font-size: .56rem!important;
    padding: 0!important;
    height: 30px!important;
    width: 70px!important;
    width: 100%!important;
    position: absolute;
    z-index: 0;
    height: 100%!important;
    top: 0;
    left: 0;
}
input#gform_submit_button_37:hover{
    background: var(--blue)!important;
    transform: translateX(3px)!important;
}
#field_37_23 .ginput_container.ginput_container_likert{
  padding-left: 0!important
}
.showTextArea{
  display: block!important;
}
label[for="input_37_5"]{
  color: var(--main-color);
  text-decoration: underline;
  cursor: pointer;
}
.gform_footer.top_label{
    width: 120px;
    margin: 0px auto 0 28px!important;
    position: relative;
    overflow: hidden;
    height: 40px;
    margin-top: -15px;
    padding: 0!important;
}
#btn_trigger_submit{
    margin: 0;
    font-size: .57rem;
    background: var(--blue);
    border: 0;
    padding: 5px 10px;
    width: 100%;
    height: 100%;
    z-index: 99;
    border-radius: 0!important
}
#btn_trigger_submit:hover,#btn_trigger_submit:active,#btn_trigger_submit:focus{
  background: var(--blue)!important;
  transform: translateX(3px);
  color: #fff!important
}
.media_host_time{
font-size: .5rem;
}
#field_37_5{
  position: relative;
  width: 100%!important;
  display: flex;
  justify-content: end;
  flex-direction: column;
  align-items: end;
  gap: 10px;
  height: 30px;
  padding: 0 28px;
}
.gform_wrapper.gravity-theme .gfield textarea.small{

  height: 50px!important;
  border-radius: 0;
  border-color: #eee!important;
  position: absolute;
  z-index: 999;
  right: 28px;
  width: 60%;
}
.ginput_container.ginput_container_textarea.showTextArea{
  width: 100%!important;
  border: 0;
  box-shadow: 0 0 10px rgb(0 0 0 / 10%);
  padding: 0!important;
}
/* video */
/* audio */
[type="audio_only"] [for="playing_video"]{display: none!important;}
[type="audio_only"] [for="playing_audio"]{display: inline-flex!important;}
.gsurvey-rating:not(:checked)>label{
  background-image: none!important;
  width: 35px!important;

}
.gsurvey-rating:not(:checked)>label[title="Terrible"],
.gsurvey-rating:not(:checked)>label[title="Excellent"]{
  margin-right: 30px;
}
.gsurvey-rating:not(:checked)>label{

  transition: 200ms linear;
}
.gsurvey-rating:not(:checked)>label:hover{
  opacity: 1
}
/* .gsurvey-rating:not(:checked)>label[title="Terrible"] i:hover{color:rgb(251 36 5 / 100%)!important}
.gsurvey-rating:not(:checked)>label[title="Very Bad"] i:hover{color:rgb(251 36 5 / 50%)!important}
.gsurvey-rating:not(:checked)>label[title="Bad"] i:hover, .gsurvey-rating:not(:checked)>label[title="Bad"] i:hover ~ .gsurvey-rating:not(:checked)>label i{color:rgb(251 201 5 / 50%)!important}
.gsurvey-rating:not(:checked)>label[title="Not Satisfactory"] i:hover{color: rgb(239 251 5 / 41%)!important}
.gsurvey-rating:not(:checked)>label[title="Satisfactory"] i:hover{color: rgb(28 217 145 / 30%)!important}
.gsurvey-rating:not(:checked)>label[title="Strong"] i:hover{color: rgb(28 217 145 / 45%)!important}
.gsurvey-rating:not(:checked)>label[title="Above Average"] i:hover{color: rgb(28 217 145 / 60%)!important}
.gsurvey-rating:not(:checked)>label[title="Excellent"] i:hover{color: rgb(28 217 145 / 80%)!important}
.gsurvey-rating:not(:checked)>label[title="Awesome"] i:hover{color: var(--blue)!important;}
.gsurvey-rating:not(:checked)>label[title="Superior"] i:hover{color:#0875a7!important} */



.gsurvey-rating:not(:checked)>label[title="Terrible"]:hover i, .gsurvey-rating:not(:checked)>label[title="Terrible"]:hover~label i{color:#de2426!important}
.gsurvey-rating:not(:checked)>label[title="Very Bad"]:hover i, .gsurvey-rating:not(:checked)>label[title="Very Bad"]:hover~label i{color:#f05d29!important}
.gsurvey-rating:not(:checked)>label[title="Bad"]:hover i, .gsurvey-rating:not(:checked)>label[title="Bad"]:hover~label i{color:#fbaf1a!important}
.gsurvey-rating:not(:checked)>label[title="Not Satisfactory"]:hover i, .gsurvey-rating:not(:checked)>label[title="Not Satisfactory"]:hover~label i{color:#f7d71f!important}
.gsurvey-rating:not(:checked)>label[title="Satisfactory"]:hover i, .gsurvey-rating:not(:checked)>label[title="Satisfactory"]:hover~label i{color: #c9d024!important}
.gsurvey-rating:not(:checked)>label[title="Good"]:hover i, .gsurvey-rating:not(:checked)>label[title="Good"]:hover~label i{color: #96c42c!important}
.gsurvey-rating:not(:checked)>label[title="Very Good"]:hover i, .gsurvey-rating:not(:checked)>label[title="Very Good"]:hover~label i{color: #45b03c!important}
.gsurvey-rating:not(:checked)>label[title="Excellent"]:hover i, .gsurvey-rating:not(:checked)>label[title="Excellent"]:hover~label i{color: #11a54d!important}
.gsurvey-rating:not(:checked)>label[title="Wow"]:hover i, .gsurvey-rating:not(:checked)>label[title="Wow"]:hover~label i{color: var(--blue)!important;}
/* checked */
.gsurvey-rating>input[value="-15"]:checked~label i{color:rgb(251 36 5 / 100%)!important}
.gsurvey-rating>input[value="-7"]:checked~label i{color:rgb(251 36 5 / 50%)!important}
.gsurvey-rating>input[value="-5"]:checked~label i{color:rgb(251 201 5 / 50%)!important}
.gsurvey-rating>input[value="-3"]:checked~label i{color: rgb(239 251 5 / 41%)!important}
.gsurvey-rating>input[value="3"]:checked~label i{color: rgb(28 217 145 / 40%)!important}
.gsurvey-rating>input[value="5"]:checked~label i{color: rgb(28 217 145 / 65%)!important}
.gsurvey-rating>input[value="6"]:checked~label i{color: rgb(28 217 145 / 80%)!important}
.gsurvey-rating>input[value="7"]:checked~label i{color: rgb(28 217 145 / 100%)!important}
.gsurvey-rating>input[value="15"]:checked~label i{color: var(--blue)!important;}









.gsurvey-rating:not(:checked)>label i{
  font-size: 1.2rem!important;
  color:#eee!important;
}
.gsurvey-rating:not(:checked)>label:before{content: ""!important}
.gsurvey-rating>input:checked~label{
  background-image: none!important;
  width: 30px!important
  color:#eee!important;
}
.gsurvey-rating>input:checked~label i{
  color: var(--green)!important;
}
table.gsurvey-likert .gsurvey-likert-choice, table.gsurvey-likert .gsurvey-likert-row-label,table.gsurvey-likert
,table.gsurvey-likert tr td,table.gsurvey-likert th.gsurvey-likert-choice-label{
  border: 0!important;
  background-color:transparent!important;
  border-top: 0!important;
  border-bottom: 0!important;
  border-right: 0!important;
  border-left: 0!important;
}
table.gsurvey-likert td.gsurvey-likert-choice.gsurvey-likert-selected{
  background-image: none!important;
  background: #fff!important;
}
table.gsurvey-likert td.gsurvey-likert-choice::after{
  font-family: "FontAwesome";
   content: "\f111 ";
   color: var(--green);
   font-size: 10px;
   border-radius: 50%;
   opacity: 0;
}
.gform_validation_error .gform_button {
  opacity: 1!important
}
.gform_validation_error{
  border: 0!important;
  padding: 5px 10px!important
}
.gfield_validation_message{display: none;}
.gsurvey-likert-selected::after {
  font-family: "FontAwesome"!important;
   content: "\f00c"!important;
   color: var(--green)!important;
   font-size: 10px!important;
   border-radius: 50%;
   opacity: 1!important;
}
.center_td{
  text-align: center!important;
}
.form_screen,.form_notes{
  display: none;
  padding: 10px 28px;
}
.form_notes{height: fit-content!important}
.form_screen img{
  box-shadow: 0 0 10px rgba(0,0,0,.1);
  width: 100%;
  height: auto;
}
.madia_popup_close{display: none;}
td.meeting_media a.no_media{
    background-color: #d4d7d9 !important;
    cursor: not-allowed;
    color: #fff !important;
}
.table:not(.table-dark) thead:not(.table-dark) th,table.dataTable.no-footer,table.dataTable th, table.dataTable td{border:0!important}
#gform_37{
  padding-bottom: 20px!important
}
/* media */
@media screen and (max-width: 1200px) {
      .madia_popup{
        width: 45%;
        min-width: 30%;
      }
      #field_37_23 .ginput_container.ginput_container_likert{
        padding-left: 5px!important
      }
      .media_host_info{display: none;}
      div#field_37_14{
      margin: 10px 5px!important;
      gap:10px!important;
      }
      div#input_37_14{width: 60%}
      .gsurvey-rating:not(:checked)>label{
        width: 22px!important;
      }
      div#field_37_11,div#field_37_23{
        width:100%!important;
      }
      .ginput_container{padding: 0 5px!important}
      .gsurvey-rating:not(:checked)>label i{font-size: 1rem!important;
      }
      .media_host_container{
        padding: 0 5px!important;
        padding-left: 5px!important;
      }
      .month_sel{
          top: 11px;
          left: 22vw;
          width: 7vw;
      }
      #search1 select{
          top: 12px;
          left: 9vw;
          width: 7.8vw;
      }
      section:first-child{
        height: 36vh;
      }
      div#field_37_14 {
          width: calc(100% - 10px)!important;
      }
      #field_37_5{
        padding: 0 5px!important;
      }
      .gform_footer.top_label{
        margin: 0 auto 0 5px!important;
      }
      .teacher_sel.load_sel{
        left: 12vw!important;
      }
      .gform_wrapper .ginput_container.ginput_container_likert table.gsurvey-likert td {
          display: table-cell!important;
          background-position: center!important;
      }
      .gform_wrapper table.gsurvey-likert tr {
          display: table-row!important;
          background-position: center!important;
     }
     .gform_wrapper table.gsurvey-likert thead {
          position: relative!important;
          top: 0!important;
          left: 0!important;
      }
}
@media screen and (max-width: 997px){
  .ta_div{
    width: 100vw!important;
  }
  .madia_popup {
    width: calc(100% - 170px);
      min-width: calc(100% - 170px );
      position: fixed;
      top: 5.5rem;
      background: #ffff;
      z-index: 99;
      height: 100vh;
      overflow: auto;
      margin: 0 0px;
      display: none;
    }
    .madia_popup_close{
      display: flex;
    }
    .media_host_container h5{padding-right: 40px!important}
    .gform_wrapper .ginput_container.ginput_container_likert table.gsurvey-likert td {
        display: table-cell!important;
        background-position: center!important;
    }
    .gform_wrapper table.gsurvey-likert tr {
    display: table-row!important;
    background-position: center!important;
    }
    .gform_wrapper table.gsurvey-likert thead {
         position: relative!important;
         top: 0!important;
         left: 0!important;
     }
     #search1 select{left: 11vw!important}
}
@media screen and (max-width: 780px){

  .madia_popup {
      width: 100vw;
      min-width: 100vw;
    }
  .month_sel {
    top: 11px;
    left: 52vw;
    width: 17vw;
   }
   #search1 select {
    width: 20vw;
    left: 20vw!important;
    }
    .dataTables_wrapper .dataTables_filter{
      margin-top: 0!imporant;
      float: right!important;
    }
    .gform_wrapper .ginput_container.ginput_container_likert table.gsurvey-likert td {
        display: table-cell!important;
        background-position: center!important;
    }
    .gform_wrapper table.gsurvey-likert tr {
    display: table-row!important;
    background-position: center!important;
    }
    .gform_wrapper table.gsurvey-likert thead {
         position: relative!important;
         top: 0!important;
         left: 0!important;
     }
}
@media screen and (max-width: 640px){
.dataTables_wrapper.no-footer .dataTables_filter {
    float: right!important;
  }
.dataTables_wrapper .dataTables_length{
  float: left!important;
  margin-top: .5rem!important
}
.madia_popup {
    top: 8.5rem;
    height: auto;
    overflow: scroll;
}
.ta_div{
  margin-top: 2rem!important;
}
#search1 select,.month_sel,.teacher_sel.load_sel {
  top: 3.2rem!important;
}
.teacher_sel.load_sel {
    left: 20vw!important;
}
#search1 select{left: 26vw!important;}
.month_sel{left: 47vw!important}
.gform_wrapper .ginput_container.ginput_container_likert table.gsurvey-likert td {
    display: table-cell!important;
    background-position: center!important;
}
.gform_wrapper table.gsurvey-likert tr {
    display: table-row!important;
}
.elementor-column-gap-default>.elementor-row>.elementor-column>.elementor-element-populated>.elementor-widget-wrap{
  padding: 0!important
}
.gform_wrapper table.gsurvey-likert thead {
     position: relative!important;
     top: 0!important;
     left: 0!important;
 }
 .dataTables_paginate.paging_simple_numbers{bottom: 40px!important}
 #gform_37 {
    padding-bottom: 50px!important;
}
}

</style>
<?php
global $wpdb;

$admin_roles = ["tech_admin","administrator", "head_of_pd",  "support", "hr", "head_of_support", "head_of_education"];
$can_review  = ["team_leader",  "hr", "head_of_education" , "head_of_pd"];
$user_meta = get_userdata(get_current_user_id());

 if( array_intersect($admin_roles, $user_meta->roles ) ) {

 //$all_recs = $wpdb->get_results( "SELECT * FROM msl_recordings where rec_file_type = 'MP4' and uploaded = 1 ORDER BY id DESC LIMIT 50" );
 $all_recs = $wpdb->get_results( "SELECT * FROM msl_recordings where rec_file_type = 'MP4' ORDER BY id DESC LIMIT 50" );



 }elseif(in_array("team_leader" , $user_meta->roles)){

 $all_recs = $wpdb->get_results("SELECT DISTINCT mtg_host_email FROM msl_recordings");

 foreach($all_recs as $mail) {
 $user = get_user_by( 'email', $mail->mtg_host_email );
 $userId = $user->ID;
     $employee = new \WPHR\HR_MANAGER\HRM\Employee( $userId );
     if ( $employee->get_reporting_to() && $employee->get_reporting_to()->ID == get_current_user_id() ){
          $rep_emails[] = $mail->mtg_host_email;
     }
 }

 $wpdb->flush();

 if(!empty($rep_emails)){
     $placeholders = array_fill(0, count($rep_emails), '%s');
     $format = implode(', ', $placeholders);
     $query = "SELECT * FROM msl_recordings WHERE mtg_host_email IN($format)";
     $all_recs = $wpdb->get_results( $wpdb->prepare($query,$rep_emails));
     $wpdb->flush();
 }

 }

 ?>

 <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<input type="hidden" class="rev_email" value="<?php echo $user_meta->user_email ?>">

  <?php if(in_array("team_leader" , $user_meta->roles)){ ?>
  <div id="search1"></div>

<?php } ?>
<?php if(!in_array("team_leader" , $user_meta->roles)): ?>

  <div class="sel_container">

 <select class="teacher_sel load_sel">
   <?php if(!isset($_GET['teacher'])): ?>
   <option value="" disabled selected>Teacher select</option>
 <?php endif; ?>
   <?php

    $all_staffs = $wpdb->get_results("SELECT DISTINCT mtg_host_email FROM msl_recordings");
    foreach($all_staffs as $all_staff):?>
  <option value="<?php echo $all_staff->mtg_host_email ?>" <?php if($tech == $all_staff->mtg_host_email){echo 'selected';} ?>><?php echo ucwords(str_replace("."," ",strstr($all_staff->mtg_host_email, '@', true))); ?>
   </option>
 <?php endforeach; ?>
 </select>
<?php endif; ?>

<?php
$max_date = $wpdb->get_results("SELECT MAX(created_at) AS 'max_date' FROM msl_recordings");
$min_date = $wpdb->get_results("SELECT MIN(created_at) AS 'min_date' FROM msl_recordings");

$begin = new DateTime($min_date[0]->min_date);
$end = new DateTime($max_date[0]->max_date);

$interval = new DateInterval('P1M');
$period = new DatePeriod($begin, $interval, $end); ?>
<select class="month_sel load_sel">
    <?php
    foreach($period as $dt) : ?>
    <option value="<?php echo $dt->format('n') ;?>" data-year="<?php echo $dt->format('Y') ;?>">
      <?php echo $dt->format('F Y') ;?>
    </option>
    <?php endforeach; ?>
</select>
  </div>
<?php

$admin_roles = ["tech_admin","administrator", "head_of_pd",  "support", "hr", "head_of_support", "head_of_education","team_leader"];
 if( array_intersect($admin_roles, $user_meta->roles ) ) : ?>
<div class="ta_div">

<table class="table table-bordered table-responsive recs_table" id="recs_table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col" data-balloon-pos="down" data-balloon="Meeting host email">teacher</th>
      <th scope="col" data-balloon-pos="down" data-balloon="Meeting id" class="hidden_td">mtg_id</th>
      <th class="center_td" scope="col" data-balloon-pos="down" data-balloon="Meeting class cid">cid</th>
      <th class="center_td hidden_td" scope="col" data-balloon-pos="down" data-balloon="Meeting class aip" class="hidden_td">Aip</th>
      <th class="center_td"  scope="col" data-balloon-pos="down" data-balloon="Record Date" class="data_th">Date</th>
      <th class="center_td" scope="col" data-balloon-pos="down" data-balloon="Record Start" class="start_th">Start</th>
      <th class="center_td" scope="col" data-balloon-pos="down" data-balloon="Record End" class="end_th">End</th>
      <th class="center_td" scope="col" data-balloon-pos="down" data-balloon-pos="down" data-balloon="Video">Media</th>
      <th class="center_td" scope="col" data-balloon-pos="down" data-balloon-pos="down" data-balloon="CQ Score">Score</th>
    </tr>
  </thead>
  <tbody class="tbody_tag">

    <?php
      $gender = get_user_meta(get_current_user_id() , 'gender' , true);
      $type='video';
      $x=1; foreach ($all_recs as $all_rec):
      $audos = $wpdb->get_results( "SELECT * FROM msl_recordings where rec_file_type = 'M4A' AND mtg_uuid = '{$all_rec->mtg_uuid}'" );

      if($gender ==  'female'){
        $file = $all_rec->rec_aws_url;
      }elseif($gender ==  'male') {
        $user = get_user_by( 'email', $all_rec->mtg_host_email );
        $userId = $user->ID;
        $host_gender =  get_user_meta($userId , 'gender' , true);
        $niqab = get_user_meta($userId,'niqab',true);
        if($host_gender == 'male'){
          $file = $all_rec->rec_aws_url;
        }elseif($host_gender == 'female' && !$niqab) {
          $file = $all_rec->rec_aws_url;
        }elseif ($host_gender == 'female' && $niqab) {
          $file = $audos->rec_aws_url;
          $type='audio';
        }

      }else{
          $file = $all_rec->rec_aws_url;
      }

        $image_class="";
        $reviewer="";
        $notes="";
        $img="";
        if( isset($all_rec->gf_id) &&  $all_rec->gf_id > 0 ) :
              $enrty = GFAPI::get_entry( $all_rec->gf_id );
              $img = $enrty[33];
              $image_class = 'score_img_'.$all_rec->id;
              $reviewer = ucwords(str_replace("."," ",strstr($enrty[30], '@', true)));
              $notes=$enrty[5]; ?>

        <?php endif; ?>
           <tr class="media_tr" <?php if($_GET['row_id'] == $all_rec->id){echo 'active';} ?> data-type="<?php echo $type ?>" data-row="<?php echo $all_rec->id ?>" data-uuid="<?php echo $all_rec->mtg_uuid?>"
              data-gf="<?php echo $all_rec->gf_id;?>" data-imgClass="<?php echo $image_class ?>" data-reviewer="<?php echo $reviewer ?>" data-notes="<?php echo $notes ?>" img-src="<?php echo $img;?>">
               <th scope="row"><?php echo $x;?></th>
               <td class="td_email" data-val="<?php echo $all_rec->mtg_host_email; ?>"> <?php echo 'U. '. ucwords(str_replace("."," ",strstr($all_rec->mtg_host_email, '@', true)));  ?></td>
               <td class="hidden_td meeting_id_td"> <?php echo $all_rec->mtg_id  ?></td>
               <td class="center_td"> <?php echo $all_rec->mtg_class_cid  ?></td>
               <td class="hidden_td"> <?php echo $all_rec->mtg_class_aip  ?></td>
               <td class="date_td center_td"> <?php echo $all_rec->rec_start  ?></td>
               <td class="start_td center_td"> <?php echo $all_rec->rec_start?></td>
               <td class="end_td center_td"> <?php echo $all_rec->rec_end ?></td>

               <td class="meeting_media center_td">
                     <a href="#"  class="madia_popup_btn" src="<?php echo $file; ?>" type="<?php echo $all_rec->rec_type?>"  data-media="video" data-balloon-pos="down" data-balloon="Size:<?php echo $all_rec->rec_aws_file_size  ?>">
                       <i class="bb-icon-video bb-icon-l" for="playing_video"></i>
                       <i class="bb-icon-headphones bb-icon-l" for="playing_audio"></i>
                     </a>
              </td>
             <td class="tr_score score_td center_td" scope="col" data-balloon-pos="down" data-balloon-pos="down" data-balloon="Score">
               <?php echo $all_rec->gf_id ?  $all_rec->cqs : '-';  ?></td>

           </tr>
    <?php $x++; endforeach; ?>

  </tbody>
</table>

</div>
<?php else: ?>
<p>You are not allowed to be here</p>

<?php endif; ?>
<!-- media popup -->
<div class="madia_popup animate__animated animate__fadeInRight" id="madia_popup">
<button type="button" class="madia_popup_close" ><i class="bb-icon-times bb-icon-l"></i></button>
  <div class="madia_popup_content">



     <section>
       <div class="media_host_container">
         <!-- teacher -->
                <h3 class="media_host_name">
                  <i class="bb-icon-user-card bb-icon-l"></i>
                  <span></span>
                </h3>
                <h5>
                  <i class="bb-icon-calendar bb-icon-l"></i>
                  Class Date :
                  <span class="media_host_time" data-balloon-pos="down" data-balloon="Record Date"> 09/11/2022</span>
                  <span>|</span>
                  <i class="bb-icon-star bb-icon-l"></i>
                  Score:
                  <span class="media_host_score" data-balloon-pos="down" data-balloon="Score" >score: </span>
                </h5>
                <h5 class="media_host_info">
                   <i class="bb-icon-user-edit bb-icon-l"></i>
                   Reviewer:
                   <span class="media_host_Reviewer" data-balloon-pos="down" data-balloon="Reviewer">Reviewer: </span>
                 </h5>
          </div>

       <!-- media -->
       <div class="media-container">
         <!-- play video -->
        <video width="100%" height="auto" controls class="media_view" controlsList="nodownload">
                <source src="" type="video/mp4">
                  Your browser does not support the video tag.
        </video>
        <!-- play audio -->
       </div>

     </section>
    <!-- gravity forn -->
    <section class="g_form">

       <?php $current_user = wp_get_current_user(); $dp_id = $all_recs[0]->id;
        $teacher = $all_recs[0]->mtg_host_email;  $date = $all_recs[0]->rec_start?>
      <?php  echo do_shortcode('[gravityform id="37" title="false" description="false" ajax="true" field_values="teacher_email='.$teacher.'&reviewer_email='.$current_user->user_email.'&db_row_id='.$dp_id.'"]') ?>
    </section>
    <section class="form_screen">
       <img src="" alt="Form screen img">
    </section>
    <section class="form_notes">
      <p></p>
    </section>
  </div>
</div>
<input type="hidden" name="AC_Teaching_Methods" value="">
<input type="hidden" name="AC_Presentation_Material" value="">
<input type="hidden" name="SS_English_Fluency" value="">
<input type="hidden" name="NAC_Class_Professionalism" value="">
<input type="hidden" name="SS_Student_Engagement" value="">

<input type="hidden" name="VL_Using_Phone" value="">
<input type="hidden" name="VL_Camera_Off" value="">
<input type="hidden" name="VL_Multitasking" value="">
<input type="hidden" name="VL_Not_Teaching" value="">
<input type="hidden" name="VL_Code_of_Honor" value="">

<script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.0.0-rc.5/dist/html2canvas.min.js"></script>


<script type="text/javascript">
    (function($){

      $(document).ready(function () {

        $(document).on('gform_confirmation_loaded', function(event, formId){

            $(".gsurvey-rating:not(:checked)>label").html('<i class="bb-icon-star bb-icon-f"></i>');
            $(".gsurvey-rating>input:checked~label").html('<i class="bb-icon-star bb-icon-f"></i>');

            $('body').append('<div class="ajax_image_section"><div class="ajaxloader"></div></div>');
            var row = $('.media_tr.active').attr('data-row');
            $.post('<?php echo admin_url('admin-ajax.php'); ?>', {
                   action: 'get_teacher_score_ajax',
                   row: row,
                   AC_Teaching_Methods:$('input[name="AC_Teaching_Methods"]').val(),
                   SS_Student_Engagement: $('input[name="SS_Student_Engagement"]').val(),
                   AC_Presentation_Material: $('input[name="AC_Presentation_Material"]').val(),
                   SS_English_Fluency: $('input[name="SS_English_Fluency"]').val(),
                   NAC_Class_Professionalism: $('input[name="NAC_Class_Professionalism"]').val(),
                   VL_Using_Phone: $('input[name="VL_Using_Phone"]').val(),
                   VL_Camera_Off: $('input[name="VL_Camera_Off"]').val(),
                   VL_Multitasking: $('input[name="VL_Multitasking"]').val(),
                   VL_Not_Teaching: $('input[name="VL_Not_Teaching"]').val(),
                   VL_Code_of_Honor: $('input[name="VL_Code_of_Honor"]').val(),
                   }, function (response){
                   $("tr.media_tr[data-row='" + row + "']").find('td.score_td').text(response.data.score);
                   $("tr.media_tr[data-row='" + row + "']").attr('img-src',response.data.img) ;
                   $('.g_form').hide();
                   $('.form_screen').show();
                   $('.form_screen').html('<img src="'+response.data.img+'" />');
                   $('.ajax_image_section').remove();
                   })

        });


   var table =  $('#recs_table').DataTable({
        "ordering": true, "pageLength": 20,
        <?php if(in_array("team_leader" , $user_meta->roles)): ?>
        initComplete: function () {
          var counter = 0;
          this.api().columns( [1] ).every( function () {
       var column = this;
     counter++;
       var select = $('<select id="tl_sel"><option value="">---</option></select>')
           .appendTo( $('#search' + counter) )
           .on( 'change', function () {
               var val = $.fn.dataTable.util.escapeRegex(
                   $(this).val()
               );

               column
                   .search( val ? '^'+val+'$' : '', true, false )
                   .draw();
           } );

       column.data().unique().sort().each( function ( d, j ) {
           select.append( '<option value="'+d+'">'+d+'</option>' );
             } );
         } );
     }
     <?php endif; ?>
       });


  $(document).on("click",".gform_button",function(e) {

  e.preventDefault();

 $('input[name="AC_Teaching_Methods"]').val($('input[name="input_11.1"]:checked').parent('td').attr('data-label'));
 $('input[name="SS_Student_Engagement"]').val($('input[name="input_11.2"]:checked').parent('td').attr('data-label'));
 $('input[name="AC_Presentation_Material"]').val($('input[name="input_11.3"]:checked').parent('td').attr('data-label'));
 $('input[name="SS_English_Fluency"]').val($('input[name="input_11.4"]:checked').parent('td').attr('data-label'));
 $('input[name="NAC_Class_Professionalism"]').val($('input[name="input_11.5"]:checked').parent('td').attr('data-label'));


     $('input[name="VL_Using_Phone"]').val($('input[name="input_31.5"]:checked').val())
     $('input[name="VL_Camera_Off"]').val($('input[name="input_31.1"]:checked').val())
     $('input[name="VL_Multitasking"]').val($('input[name="input_31.2"]:checked').val())
     $('input[name="VL_Not_Teaching"]').val($('input[name="input_31.3"]:checked').val())
     $('input[name="VL_Code_of_Honor"]').val($('input[name="input_31.4"]:checked').val())

      if($(this).val()=="Submit"){
          $(this).val("Click To Confirm");
        }

    if($('input[name="input_33"]').val() == ""){
      html2canvas(document.querySelector(".gform_body")).then((canvas) => {
       $('input[name="input_33"]').val(canvas.toDataURL("image/png;base64"));
      });

    }else if($('input[name="input_33"]').val() && $(this).val() == "Click To Confirm"){
      $(this).closest('form').submit();
    }

 });

 $(document).on( "change", "#input_37_23 > tbody > tr > td" , function(){
   const label = $(this).parent('tr').find('td:first').text();
   const val = $(this).attr('data-label');
   if(val !== "N/A"){
      if(label == "Camera Off"){
        $('input[name="input_31.1"]').attr("checked",true);
      }else if(label == "Multitasking"){
        $('input[name="input_31.2"]').attr("checked",true);
      }else if (label == "Not Teaching") {
        $('input[name="input_31.3"]').attr("checked",true);
      }else if (label == "Code of Honor") {
        $('input[name="input_31.4"]').attr("checked",true);
      }else if(label == "Using Phone"){
       $('input[name="input_31.5"]').attr("checked",true);
      }
   }else{
     if(label == "Camera Off"){
       $('input[name="input_31.1"]').removeAttr("checked");
     }else if(label == "Multitasking"){
       $('input[name="input_31.2"]').removeAttr("checked");
     }else if (label == "Not Teaching") {
       $('input[name="input_31.3"]').removeAttr("checked");
     }else if (label == "Code of Honor") {
       $('input[name="input_31.4"]').removeAttr("checked");
     }else if (label == "Using Phone") {
       $('input[name="input_31.5"]').removeAttr("checked");
     }
   }
 });



 $(document).on("click",".media_tr",function() {

  $('input[name="input_30"]').val($('.rev_email').val());
  $('input[name="input_20"]').val($(this).find("td.td_email").attr('data-val'));
  $('input[name="input_32"]').val($(this).attr("data-row"));
  $('input[name="input_18"]').val($(this).attr("data-uuid"));
  $('input[name="input_28"]').val( $(this).find("td.date_td").text().trim() );

})

      $(".load_sel").on("change",function(){
        const teacher = $(".teacher_sel").find(":selected").val();
        const month = $('.month_sel').find(":selected").val();
        const year = $('.month_sel').find(":selected").attr('data-year');
        $('body').append('<div class="ajax_image_section"><div class="ajaxloader"></div></div>');
        $.post('<?php echo admin_url('admin-ajax.php'); ?>', {
               action: 'load_teacher_zoom_recs',
               teacher: teacher,
               month: month,
               year: year,
               }, function (response){
               $('.ajax_image_section').remove();
               table.destroy();
               $('#recs_table tbody').html(response);
               table = $('#recs_table').DataTable({"pageLength": 20});
               HandleTimeView();
               })
      })

  });
  })(jQuery);
jQuery(document).ready(function(){
  // handle popup modals
  function HandleTimeView(){
    // return date
    var reDate = /T\d{2}:\d{2}:\d{2}Z/g;
    var reTime = /\d{4}-\d{2}-\d{2}T/g;
    var str = '2015-12-22T17:44:24Z';
    var subst = '';

    var replacedDate = document.querySelectorAll(".date_td")
    var replacedstart = document.querySelectorAll(".start_td")
    var replacedend = document.querySelectorAll(".end_td")
    for(i=0;i<replacedDate.length;i++){


      replacedDate[i].innerHTML=replacedDate[i].innerHTML.replace(reDate, subst).replace(/(\d{4})-(\d{1,2})-(\d{1,2})/, function(match,y,m,d) {
        return m + '/' + d + '/' + y;
         });
      replacedstart[i].innerHTML=replacedstart[i].innerHTML.replace(reTime, subst).replace(reTime, subst).replace(/(\d{2}):(\d{1,2}):(\d{1,2})Z/, function(match,h,m,s,Z) {
        return h + ':' + m ;
        });
      replacedend[i].innerHTML=replacedend[i].innerHTML.replace(reTime, subst).replace(/(\d{2}):(\d{1,2}):(\d{1,2})Z/, function(match,hh,mm,ss,Z) {  return hh + ':' + mm ;});

    }
  }



  function HandleStart(){
      <?php if(!$_GET['teacher']): ?>
      document.querySelector('tr.media_tr').classList.add("active");
      <?php endif; ?>
      document.querySelector(".media_view").setAttribute('src',document.querySelector("td.meeting_media a").getAttribute("src"));
      document.querySelector(".media_view").setAttribute('type',document.querySelector("td.meeting_media a").getAttribute("type"));
      document.querySelector(".media_host_name span").innerHTML=document.querySelector("td.td_email").innerHTML;
      document.querySelector(".media_host_score").innerHTML=document.querySelector("td.score_td").innerHTML;
     document.querySelector(".media_host_Reviewer").innerHTML=document.querySelector("tbody tr").getAttribute("data-reviewer");


      document.querySelector(".media_host_time").innerHTML=document.querySelector("td.date_td").innerHTML.replace(/T\d{2}:\d{2}:\d{2}Z/g, "").replace(/(\d{4})-(\d{1,2})-(\d{1,2})/, function(match,y,m,d) {
              return m + '/' + d + '/' + y;
               });
      HandleTimeView();
      jQuery("label[for='input_37_5']").on("click",function(){
        jQuery(".ginput_container.ginput_container_textarea").toggleClass('showTextArea');
      })

      jQuery(".gsurvey-rating:not(:checked)>label").html('<i class="bb-icon-star bb-icon-f"></i>');
      jQuery(".gsurvey-rating>input:checked~label").html('<i class="bb-icon-star bb-icon-f"></i>');



       if(document.querySelector("tbody tr").getAttribute("img-src")){
          document.querySelector(".g_form").style.display="none";
      }else{
          document.querySelector(".g_form").style.display="flex";
      }
      if(document.querySelector("tbody tr").getAttribute("img-src").length > 0){
        document.querySelector(".form_screen").style.display="block";
        document.querySelector(".form_screen img").setAttribute("src",document.querySelector("tbody tr").getAttribute("img-src"));
      }
      if(document.querySelector("tbody tr").getAttribute("data-notes").length > 0){
        document.querySelector(".form_notes").style.display="block";
        document.querySelector(".form_screen p").innerHTML=document.querySelector("tbody tr").getAttribute("data-notes");
      }



  }
  HandleStart();

  jQuery(".madia_popup_close").on("click",function(){
      jQuery("#madia_popup").css('display','none');
  })
  jQuery(document).on("click change load", (event) => {
  jQuery("label[for='input_37_5']").on("click",function(){
    jQuery(".ginput_container.ginput_container_textarea").toggleClass('showTextArea');
  })
      jQuery(".gsurvey-rating:not(:checked)>label").html('<i class="bb-icon-star bb-icon-f"></i>');
      jQuery(".gsurvey-rating>input:checked~label").html('<i class="bb-icon-star bb-icon-f"></i>');


    HandleTimeView();
    jQuery(".media_tr").click(function() {
       jQuery(this).addClass('active').siblings().removeClass('active');
        jQuery(".madia_popup").css("display","flex");
       jQuery(".media_host_name span").html(jQuery(this).find("td.td_email").text());
       jQuery(".media_host_time").html(jQuery(this).find("td.date_td").text());
       jQuery(".media_host_score").html(jQuery(this).find("td.score_td").text());
       jQuery(".media_host_Reviewer").html(jQuery(this).attr("data-reviewer"));
       jQuery(".media_view").attr('src',jQuery(this).find("td.meeting_media a[data-media='video']").attr("src"));
       jQuery(".media_view").attr('type',jQuery(this).find("td.meeting_media a[data-media='video']").attr("type"));
       if(jQuery(this).attr("img-src")){
         jQuery(".g_form").css("display","none");
         jQuery(this).attr("data-imgclass")

       }else{
         jQuery(".g_form").css("display","flex");
       }
       if(jQuery(this).attr("img-src").length > 0){
         jQuery(".form_screen img").attr("src",jQuery(this).attr("img-src"));
         jQuery(".form_screen").css("display","block")
       }else{
         jQuery(".form_screen").css("display","none")
       }

       if(jQuery(this).attr("data-notes").length > 0){
         jQuery(".form_notes p").html(jQuery(this).attr("data-notes"));
         jQuery(".form_notes").css("display","block");
       }else{
         jQuery(".form_notes").css("display","none");
       }

    });


    // handele no video
    $('.meeting_media .madia_popup_btn').each(function() {
                if ($(this).attr('src') === '') {
                    $(this).addClass("no_media");
                }
           });

  })


 function HandleTimeView(){
   // return date
   var reDate = /T\d{2}:\d{2}:\d{2}Z/g;
   var reTime = /\d{4}-\d{2}-\d{2}T/g;
   var str = '2015-12-22T17:44:24Z';
   var subst = '';

   var replacedDate = document.querySelectorAll(".date_td")
   var replacedstart = document.querySelectorAll(".start_td")
   var replacedend = document.querySelectorAll(".end_td")
   for(i=0;i<replacedDate.length;i++){


     replacedDate[i].innerHTML=replacedDate[i].innerHTML.replace(reDate, subst).replace(/(\d{4})-(\d{1,2})-(\d{1,2})/, function(match,y,m,d) {
       return m + '/' + d + '/' + y;
        });
     replacedstart[i].innerHTML=replacedstart[i].innerHTML.replace(reTime, subst).replace(reTime, subst).replace(/(\d{2}):(\d{1,2}):(\d{1,2})Z/, function(match,h,m,s,Z) {
       return h + ':' + m ;
       });
     replacedend[i].innerHTML=replacedend[i].innerHTML.replace(reTime, subst).replace(/(\d{2}):(\d{1,2}):(\d{1,2})Z/, function(match,hh,mm,ss,Z) {  return hh + ':' + mm ;});

   }
 }


 $('.meeting_media .madia_popup_btn').each(function() {
             if ($(this).attr('src') === '') {
                 $(this).addClass("no_media");
             }
        });
})

</script>
