 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <h1>Projects</h1>
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="#">Home</a></li>
                         <li class="breadcrumb-item active">Projects</li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>

     <!-- Main content -->
     <section class="content">

         <!-- Default box -->
         <div class="card">
             <div class="card-header">
                 <h3 class="card-title">Projects</h3>

                 <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                         <i class="fas fa-minus"></i>
                     </button>
                     <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                         <i class="fas fa-times"></i>
                     </button>
                 </div>
             </div>
             <div class="card-body p-0">
                 <table class="table table-striped projects">
                     <thead>
                         <tr>
                             <th style="width: 1%">
                                 #
                             </th>
                             <th style="width: 20%">
                                 Page Name
                             </th>
                             <th style="width: 20%">
                             </th>
                         </tr>
                     </thead>
                     <tbody>

                         <?php foreach ($pages as $page) {?>
                         <tr>
                             <td>
                                 # <?= $page->id ?>
                             </td>
                             <td>
                                 <a>
                                     <?= $page->title ?>
                                 </a>


                             </td>

                             <td class="project-actions text-right">

                                 <a class="btn btn-info btn-sm"
                                     href="/CMS/public/admin/index.php?module=page&action=editPage&amp;id=<?= $page->id ?>">
                                     <i class="fas fa-pencil-alt">
                                     </i>
                                     Edit
                                 </a>
                                 <a class="btn btn-danger btn-sm"
                                     href="/CMS/public/admin/index.php?module=page&action=deletePage&amp;id=<?= $page->id ?>">
                                     <i class="fas fa-trash">
                                     </i>
                                     Delete
                                 </a>
                             </td>
                         </tr>

                         <?php }?>

                     </tbody>
                 </table>
             </div>
             <!-- /.card-body -->
         </div>
         <!-- /.card -->

     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->