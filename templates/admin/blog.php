<?php include("includes/header.php") ?>

<!-- Begin page -->
<div class="wrapper">
 <!-- ========== Left Sidebar Start ========== -->
 <?php include("includes/left-sidebar.php") ?>
 <!-- Left Sidebar End -->

 <!-- ============================================================== -->
 <!-- Start Page Content here -->
 <!-- ============================================================== -->

 <div class="content-page categories-page">
  <div class="content">
   <!-- Topbar Start -->
   <?php include("includes/topbar.php") ?>
   <!-- end Topbar -->

   <!-- Start Content-->
   <div class="container-fluid">

    <!-- start page title -->
    <div class="row">
     <div class="col-12">
      <div class="page-title-box">
       <!-- <div class="page-title-right">
        <ol class="breadcrumb m-0">
         <li class="breadcrumb-item"><a href="javascript: void(0);">Hyper</a></li>
         <li class="breadcrumb-item"><a href="javascript: void(0);">Base UI</a></li>
         <li class="breadcrumb-item active">Categories</li>
        </ol>
       </div> -->
       <h4 class="page-title">Categories</h4>
      </div>
     </div>
    </div>
    <!-- end page title -->


    <div class="row">
     <div class="col-12">
      <div class="card">
       <ul class="list-group list-group-flush">
        <li class="list-group-item">
         <div class="mb-2">
          <h4 class="header-title mt-2">Quill Editor</h4>
          <p class="text-muted font-14">Snow is a clean, flat toolbar theme.</p>

          <ul class="nav nav-tabs nav-bordered mb-3">
           <li class="nav-item">
            <a href="#hint-emoji-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
             Preview
            </a>
           </li>
           <li class="nav-item">
            <a href="#hint-emoji-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
             Code
            </a>
           </li>
          </ul> <!-- end nav-->
          <div class="tab-content">
           <div class="tab-pane show active" id="hint-emoji-preview">
            <div id="snow-editor" style="height: 300px;">
             <h3><span class="ql-size-large">Hello World!</span></h3>
             <p><br></p>
             <h3>This is an simple editable area.</h3>
             <p><br></p>
             <ul>
              <li>
               Select a text to reveal the toolbar.
              </li>
              <li>
               Edit rich document on-the-fly, so elastic!
              </li>
             </ul>
             <p><br></p>
             <p>
              End of simple area
             </p>
            </div><!-- end Snow-editor-->
           </div> <!-- end preview-->

           <div class="tab-pane" id="hint-emoji-code">
            <p>Please include following css file at <code>head</code> element</p>
            <pre>
                                                            <span class="html escape">
                                                                &lt;!-- Quill css --&gt;
                                                                &lt;link href=&quot;assets/css/vendor/quill.core.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; /&gt;
                                                                &lt;link href=&quot;assets/css/vendor/quill.snow.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; /&gt;                                                  
                                                            </span>
                                                        </pre> <!-- end highlight-->

            <p>Make sure to include following js files at end of <code>body</code> element</p>

            <pre class="mb-0">
                                                            <span class="html escape">
                                                                &lt;!-- quill js --&gt;
                                                                &lt;script src=&quot;assets/js/vendor/quill.min.js&quot;&gt;&lt;/script&gt;
                                                                &lt;!-- quill Init js--&gt;
                                                                &lt;script src=&quot;assets/js/pages/demo.quilljs.js&quot;&gt;&lt;/script&gt;
                                                            </span>
                                                        </pre> <!-- end highlight-->
            <pre class="mb-0">
                                                            <span class="html escape">
                                                                &lt;!-- HTML --&gt;
                                                                &lt;div id=&quot;snow-editor&quot; style=&quot;height: 300px;&quot;&gt;
                                                                    &lt;h3&gt;&lt;span class=&quot;ql-size-large&quot;&gt;Hello World!&lt;/span&gt;&lt;/h3&gt;
                                                                    &lt;p&gt;&lt;br&gt;&lt;/p&gt;
                                                                    &lt;h3&gt;This is an simple editable area.&lt;/h3&gt;
                                                                    &lt;p&gt;&lt;br&gt;&lt;/p&gt;
                                                                    &lt;ul&gt;
                                                                        &lt;li&gt;
                                                                            Select a text to reveal the toolbar.
                                                                        &lt;/li&gt;
                                                                        &lt;li&gt;
                                                                            Edit rich document on-the-fly, so elastic!
                                                                        &lt;/li&gt;
                                                                    &lt;/ul&gt;
                                                                    &lt;p&gt;&lt;br&gt;&lt;/p&gt;
                                                                    &lt;p&gt;
                                                                        End of simple area
                                                                    &lt;/p&gt;
                                                                &lt;/div&gt; 
                                                            </span>
                                                        </pre> <!-- end highlight-->
           </div> <!-- end preview code-->
          </div> <!-- end tab-content-->

         </div>
        </li>

        <li class="list-group-item">
         <div class="mb-2">
          <h5 class="mb-1">Bubble Editor</h5>
          <p class="text-muted font-14">Bubble is a simple tooltip based theme.</p>

          <ul class="nav nav-tabs nav-bordered mb-3">
           <li class="nav-item">
            <a href="#hint-mentions-preview" data-bs-toggle="tab" aria-expanded="false" class="nav-link active">
             Preview
            </a>
           </li>
           <li class="nav-item">
            <a href="#hint-mentions-code" data-bs-toggle="tab" aria-expanded="true" class="nav-link">
             Code
            </a>
           </li>
          </ul> <!-- end nav-->
          <div class="tab-content">
           <div class="tab-pane show active" id="hint-mentions-preview">
            <div id="bubble-editor" style="height: 300px;">
             <h3><span class="ql-size-large">Hello World!</span></h3>
             <p><br></p>
             <h3>This is an simple editable area.</h3>
             <p><br></p>
             <ul>
              <li>
               Select a text to reveal the toolbar.
              </li>
              <li>
               Edit rich document on-the-fly, so elastic!
              </li>
             </ul>
             <p><br></p>
             <p>
              End of simple area
             </p>
            </div> <!-- end Snow-editor-->
           </div> <!-- end preview-->

           <div class="tab-pane" id="hint-mentions-code">
            <p>Please include following css file at <code>head</code> element</p>
            <pre>
                                                            <span class="html escape">
                                                                &lt;!-- Quill css --&gt;
                                                                &lt;link href=&quot;assets/css/vendor/quill.bubble.css&quot; rel=&quot;stylesheet&quot; type=&quot;text/css&quot; /&gt;                                                
                                                            </span>
                                                        </pre> <!-- end highlight-->

            <pre class="mb-0">
                                                            <span class="html escape">
                                                                &lt;div id=&quot;bubble-editor&quot; style=&quot;height: 300px;&quot;&gt;
                                                                    &lt;h3&gt;&lt;span class=&quot;ql-size-large&quot;&gt;Hello World!&lt;/span&gt;&lt;/h3&gt;
                                                                    &lt;p&gt;&lt;br&gt;&lt;/p&gt;
                                                                    &lt;h3&gt;This is an simple editable area.&lt;/h3&gt;
                                                                    &lt;p&gt;&lt;br&gt;&lt;/p&gt;
                                                                    &lt;ul&gt;
                                                                        &lt;li&gt;
                                                                            Select a text to reveal the toolbar.
                                                                        &lt;/li&gt;
                                                                        &lt;li&gt;
                                                                            Edit rich document on-the-fly, so elastic!
                                                                        &lt;/li&gt;
                                                                    &lt;/ul&gt;
                                                                    &lt;p&gt;&lt;br&gt;&lt;/p&gt;
                                                                    &lt;p&gt;
                                                                        End of simple area
                                                                    &lt;/p&gt;
                                                                &lt;/div&gt;
                                                            </span>
                                                        </pre> <!-- end highlight-->
           </div> <!-- end preview code-->
          </div> <!-- end tab-content-->

         </div>
        </li>
       </ul> <!-- end list-->
      </div> <!-- end card-->
     </div> <!-- end col-->
    </div>
    <!-- end row -->

   </div>
   <!-- container -->




   <!-- Info Alert Modal -->
   <div id="info-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
     <div class="modal-content">
      <div class="modal-body p-4">
       <div class="text-center">
        <h4 class="mt-2">are you sure you want to delete this!</h4>
        <button type="button" class="btn btn-danger my-2" data-bs-dismiss="modal">yes</button>
       </div>
      </div>
     </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->

  </div>
  <!-- content -->

  <!-- Footer Start -->
  <?php include("includes/content-footer.php") ?>
  <!-- end Footer -->

 </div>

 <!-- ============================================================== -->
 <!-- End Page content -->
 <!-- ============================================================== -->


</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<?php include("includes/end-bar.php") ?>
<div class="rightbar-overlay"></div>
<!-- /End-bar -->

<!-- bundle -->
<?php include("includes/footer.php") ?>