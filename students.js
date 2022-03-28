var application = new Vue({
    el:'#crudApp',
    data:{
     allData:'',
     myModel:false,
     actionButton:'Insert',
     dynamicTitle:'Add Data',
    },
    methods:{
     fetchAllData:function(){
      axios.post('action.php', {
       action:'fetchall'
      }).then(function(response){
       application.allData = response.data;
      });
     },
     openModel:function(){
      application.first_name = '';
      application.last_name = '';
      application.email = '';
      application.contact = '';
      application.actionButton = "Add Student";
      application.dynamicTitle = "Add Student's Information";
      application.myModel = true;
     },
     submitData:function(){
      if(application.first_name != '' && application.last_name != '' && application.email != '' && application.contact != '')
      {
       if(application.actionButton == 'Add Student')
       {
        axios.post('action.php', {
         action:'insert',
         firstName:application.first_name, 
         lastName:application.last_name,
         Email:application.email,
         Contact:application.contact
   
        }).then(function(response){
         application.myModel = false;
         application.fetchAllData();
         application.first_name = '';
         application.last_name = '';
         application.email = '';
         application.contact = '';
         alert(response.data.message);
        });
       }
       if(application.actionButton == 'Update')
       {
        axios.post('action.php', {
         action:'update',
         firstName : application.first_name,
         lastName : application.last_name,
         Email : application.email,
         Contact : application.contact,
         hiddenId : application.hiddenId
        }).then(function(response){
         application.myModel = false;
         application.fetchAllData();
         application.first_name = '';
         application.last_name = '';
         application.email = '';
         application.contact = '';
         application.hiddenId = '';
         alert(response.data.message);
        });
       }
      }
      else
      {
       alert("All Fields Required!");
      }
     },
     fetchData:function(id){
      axios.post('action.php', {
       action:'fetchSingle',
       id:id
      }).then(function(response){
       application.first_name = response.data.first_name;
       application.last_name = response.data.last_name;
       application.email = response.data.email;
       application.contact = response.data.contact;
       application.hiddenId = response.data.id;
       application.myModel = true;
       application.actionButton = 'Update';
       application.dynamicTitle = "Edit Student's Information";
      });
     },
     deleteData:function(id){
      if(confirm("Are you sure you want to remove student?"))
      {
       axios.post('action.php', {
        action:'delete',
        id:id
       }).then(function(response){
        application.fetchAllData();
        alert(response.data.message);
       });
      }
     }
    },
    created:function(){
     this.fetchAllData();
    }
   });
   