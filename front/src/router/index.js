import Vue from 'vue'
import Router from 'vue-router'
import Projects from '@/components/Projects'
import ProjectLists from '@/components/projects/List'
import ProjectShow from '@/components/projects/Show'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      redirect: '/projects'
    },
    {
      path: '/projects',
      component: Projects,
      children: [
          {
              path: '',
              name: 'projects.index',
              component: ProjectLists
          },
          {
            path: ':id',
            name: 'projects.show',
            component: ProjectShow
        }
      ]
    }
  ]
})
