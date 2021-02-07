<template>
  <div>
    <div class="col-12">
      <h3>Tasks</h3>
      <table
        class="table table-striped table-inverse table-responsive align-self-center">
        <thead class="thead-inverse">
          <tr>
            <th>name</th>
            <th>description</th>
            <th>start at</th>
            <th>end at</th>
            <th>task type</th>
            <th>status</th>
            <th class="text-center" colspan="2">Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="task in tasks" :key="task.id">
            <td scope="row">{{ task.name }}</td>
            <td>{{ task.description }}</td>
            <td>{{ task.start_at }}</td>
            <td>{{ task.end_at }}</td>
            <td>{{ task.task_type }}</td>
            <td>{{ task.status }}</td>
            <td>
              <button class="btn badge badge-primary" @click="get(task.id)" data-toggle="modal" data-target="#modelId"><i class="fas fa-edit"></i> Edit</button>
            </td>
            <td>
              <button class="btn badge badge-danger" @click="destroy(task.id)"><i class="fa fa-trash" aria-hidden="true"></i> Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
      <button class="btn badge badge-success" data-toggle="modal" data-target="#modelCreate"><i class="fa fa-plus-circle" aria-hidden="true"></i> New Task</button>
    </div>

    <!-- Add New Modal -->
    <div class="modal fade" id="modelCreate" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form id="formUpdate">
                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input v-model="task.name" type="text" class="form-control" id="name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <input v-model="task.description" type="text" class="form-control" id="description">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="start_at" class="col-sm-2 col-form-label">start at</label>
                        <div class="col-sm-10">
                          <input v-model="task.start_at" type="datetime-local" class="form-control" id="start_at">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="end_at" class="col-sm-2 col-form-label">end at</label>
                        <div class="col-sm-10">
                          <input v-model="task.end_at" type="datetime-local" class="form-control" id="end_at">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="type" class="col-sm-2 col-form-label">type</label>
                        <div class="col-sm-10">
                          <select name="task_type" v-model="task.task_type" class="form-control" id="type-add">
                          </select>
                        </div>
                      </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" @click="create()" class="btn btn-primary">Add</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Updating Modal -->
    <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Task</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <form id="formUpdate">
                      <input type="text" :model="task.id" id="id" hidden>
                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input v-model="task.name" type="text" class="form-control" id="name">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <input v-model="task.description" type="text" class="form-control" id="description">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="start_at" class="col-sm-2 col-form-label">start at</label>
                        <div class="col-sm-10">
                          <input v-model="task.start_at" type="datetime-local" class="form-control" id="start_at">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="end_at" class="col-sm-2 col-form-label">end at</label>
                        <div class="col-sm-10">
                          <input v-model="task.end_at" type="datetime-local" class="form-control" id="end_at">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="type" class="col-sm-2 col-form-label">type</label>
                        <div class="col-sm-10">
                          <select name="task_type" v-model="task.task_type" class="form-control" id="type-update">
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="status" class="col-sm-2 col-form-label">status</label>
                        <div class="col-sm-10">
                          <select name="status" v-model="task.status" class="form-control" id="status">
                            <option v-if="task.status == 'in progress'" selected value="in progress">In progress</option>
                            <option v-else value="in progress">In progress</option>
                            <option v-if="task.status == 'completed'" selected value="completed">Completed</option>
                            <option v-else value="completed">Completed</option>
                          </select>
                        </div>
                      </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" @click="update()" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tasks: [],
      user_id: $('meta[name="user_id"]').attr('content'),
      task:{
        id:'',
        name:'',
        description:'',
        start_at:'',
        end_at:'',
        user_id:'',
        task_type:'',
        status:''
      },
      types:[]
    };
  },
  mounted() {
    this.ready();
  },
  methods: {
    get(id) {
      axios
        .get(`api/tasks/get/${id}`)
        .then((response) =>{
           this.task = response.data;
           axios
                .get(`api/tasks/${id}/type`)
                .then((response) =>{
                  $('#type-update').html('');
                   this.types.map(item => {
                     $('#type-update').append(`<option ${(item.id == response.data.id) ? 'selected="true"': ''} value="${item.id}" >${item.title}</option>`);
                   })
                })
                .catch((error) => console.error(error));
        })
        .catch((error) => console.error(error));
    },

    create(){
      this.task.user_id = this.user_id;
      this.task.status = 'in progress';
       axios
        .post(`api/tasks/create`,this.task)
        .then((response) => {
            this.ready();
            $('#modelCreate').modal('toggle');
          })
        .catch((error) => console.error(error));
    },

    update() {
      axios
        .post(`api/tasks/${this.task.id}/update`,this.task)
        .then((response) => {
            this.ready();
            $('#modelId').modal('toggle');
          })
        .catch((error) => console.error(error));
    },
    
    
    destroy(id) {
      axios
        .delete(`api/tasks/${id}/destroy`)
        .then((response) => {
          this.ready();
        })
        .catch((error) => console.error(error));
    },

    ready(){
      axios
      .get(`api/tasks/${this.user_id}`)
      .then((response) => this.tasks = response.data)
      .catch((error) => console.error(error));
      $('#type-add').html('');
      axios
      .get(`api/types`)
      .then((response) => {
        this.types = response.data;
        this.types.map(item => {
          $('#type-add').append(`<option value="${item.id}" >${item.title}</option>`);
        })
      })
      .catch((error) => console.error(error));
    }
  },
};
</script>