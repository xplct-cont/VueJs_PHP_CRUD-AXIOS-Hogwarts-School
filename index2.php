<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styless.css">
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>VUE JS Crud</title>
</head>
<body>

        <div class="row">
        <nav class="col-lg-12">
           <h3 align='center'>Hogwarts School of Witchcraft and Wizardry</h3>       
            <img class="logo" src="./images/hogwarts.png" alt="">       
          
         </nav>
         </div>


         <div class="container" 
    id="crudApp">    
   <br><br><br><br><br>

   <div class="panel ">
     <div class="panel-heading">
       <div class="row">
       <h4>Slytherin Students</h4>
           <div class="col-md-6">
          
       </div>
      <div class="col-md-6" align="right">
       <input type="button" class="btn btn-primary btn-lg " @click="openModel" value="Add Student" />
      </div>
     </div>
    </div>
    <div class="panel-body">
     <div class="table-responsive ">
      <table class="table table-bordered table-striped text-center bg-info">
       <tr>
         
       </style>
        <th class="text-center bg-primary">First Name</th>
        <th class="text-center bg-primary">Last Name</th>
        <th class="text-center bg-primary">Email</th>
        <th class="text-center bg-primary">Contact</th>
        <th class="text-center bg-primary">Edit</th>
        <th class="text-center bg-primary">Delete</th>
       </tr>
       <tr v-for="row in allData">
        <td>{{ row.first_name }}</td>
        <td>{{ row.last_name }}</td>
        <td>{{ row.email }}</td>
        <td>{{ row.contact }}</td>
        <td><button type="button" name="edit" class="btn btn-warning btn-xs edit" @click="fetchData(row.id)">Edit</button></td>
        <td><button type="button" name="delete" class="btn btn-danger btn-xs delete" @click="deleteData(row.id)">Delete</button></td>
       </tr>
      </table>
     </div>
    </div>
   </div>
   <div v-if="myModel">
    <transition name="model">
     <div class="modal-mask">
      <div class="modal-wrapper">
       <div class="modal-dialog">
        <div class="modal-content">
         <div class="modal-header bg-primary">
          <button type="button" class="close" @click="myModel=false"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">{{ dynamicTitle }}</h4>
         </div>
         <div class="modal-body">
          <div class="form-group">
           <label>Enter First Name</label>
           <input type="text" class="form-control" v-model="first_name" />
          </div>
          <div class="form-group">
           <label>Enter Last Name</label>
           <input type="text" class="form-control" v-model="last_name" />
          </div>
          <div class="form-group">
           <label>Enter Email</label>
           <input type="text" class="form-control" v-model="email" />
          </div>
          <div class="form-group">
           <label>Enter Contact No.</label>
           <input type="text" class="form-control" v-model="contact" />
          </div>
          <br />
          <div align="center">
           <input type="hidden" v-model="hiddenId" />
           <input type="button" class="btn btn-success btn-md" v-model="actionButton" @click="submitData" />
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </transition>
   </div>

    <p>
        <a class="zero" href="index.html">
         Home
          </a>
           </p>

           
   <p>
        <a class="one" href="index4.php">
         Hufflepuff
          </a>
           </p>

           
    <p>

    <p>
        <a class="two" href="index1.php">
         Gryffindor
          </a>
           </p>


    <p>
        <a class="three" href="index3.php">
         Ravenclaw
          </a>
           </p>

   </div>
  <script src="./studentss.js"></script>
</body>
</html>