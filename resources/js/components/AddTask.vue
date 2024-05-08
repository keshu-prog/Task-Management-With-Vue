<template>
    <div>
        <h3 class="text-center">Create task</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addTask">
                    <div class="form-group">
                        <label>Task Title</label>
                        <input type="text" class="form-control" v-model="task.title">
                    </div>
                    <div class="form-group">
                        <label>Task Description</label>
                        <input type="text" class="form-control" v-model="task.description">
                    </div>
                    <div class="form-group">
                        <label>Task Deadline</label>
                        <input type="date" class="form-control" v-model="task.deadline">
                    </div>
                    <div class="form-group">
                        <label>Select User</label>
                        <select class="form-control" v-model="task.user_id">
                            <option v-for="user in users" :key="user.id" :value="user.id">{{ user.name }}</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                task: {
                    title: '',
                    description: '',
                    deadline: '',
                    user_id: null  // Initially, no user is selected
                },
                users: []  // Array to store the list of users
            }
        },
        mounted() {
            this.fetchUsers(); // Fetch users when the component is mounted
        },
        methods: {
            fetchUsers() {
                this.axios
                    .get('http://127.0.0.1:8000/api/users')
                    .then(response => {
                        this.users = response.data; // Set the list of users
                    })
                    .catch(err => console.log(err));
            },
            addTask() {
                this.axios
                    .post('http://127.0.0.1:8000/api/tasks', this.task)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err))
                    .finally(() => this.loading = false);
            }
        }
    }
</script>
