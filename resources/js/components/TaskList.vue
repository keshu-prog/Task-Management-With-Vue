<template>
  <div class="container">
    <h2 class="text-center mt-5">Tasks List</h2>

    <div class="table-responsive mt-3">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>ID</th>
            <th>Task Name</th>
            <th>Task Description</th>
            <th>Task Deadline</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="task in tasks" :key="task.id">
            <td>{{ task.id }}</td>
            <td>{{ task.title }}</td>
            <td>{{ task.description }}</td>
            <td>{{ task.deadline }}</td>
            <td>
              <div class="btn-group" role="group">
                <router-link :to="{ name: 'edit', params: { id: task.id }}" class="btn btn-success">Edit</router-link>
                <button class="btn btn-danger" @click="deletetask(task.id)">Delete</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      tasks: []
    }
  },
  created() {
    this.axios
      .get('http://127.0.0.1:8000/api/tasks')
      .then(response => {
        console.log(response);
        this.tasks = response.data;
      });
  },
  methods: {
    deletetask(id) {
      this.axios
        .delete(`http://127.0.0.1:8000/api/tasks/${id}`)
        .then(response => {
          let i = this.tasks.map(data => data.id).indexOf(id);
          this.tasks.splice(i, 1)
        });
    }
  }
}
</script>

<style scoped>
.container {
  padding: 20px;
}
</style>
