import { createRouter, createWebHistory } from 'vue-router'
//import HomeView from '../views/HomeView.vue'
import StudentList from '../views/StudentList.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'studentList',
      component: StudentList
    },
    {
      path: '/student/:id',
      name: 'detail',
      component: () => import('../views/StudentDetails.vue')
    },
    {
      path: '/adminList/',
      name: 'adminList',
      component: () => import('../views/AdminList.vue')
    }

  ]
})

export default router
