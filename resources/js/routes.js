import TaskList from './components/TaskList.vue';
import AddTask from './components/AddTask.vue';
import EditTasks from './components/EditTasks.vue';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: TaskList
    },
    {
        name: 'create',
        path: '/create',
        component: AddTask
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditTasks
    }
];