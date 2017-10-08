export default {
    lessons: {
        type: 'post',
        link: '/admin/ajax/lessons'
    },
    lessonShow: {
        type: 'get',
        link: '/admin/ajax/lesson/'
    },
    lessonUpdate: {
        type: 'post',
        link: '/admin/ajax/lesson/'
    },
    lessonInsert: {
        type: 'post',
        link: '/admin/ajax/lessoninsert/'
    },
    lessonDelete: {
        type: 'delete',
        link: '/admin/ajax/lessondelete/'
    },


    courses: {
        type: 'post',
        link: '/admin/ajax/courses'
    },
    courseShow: {
        type: 'get',
        link: '/admin/ajax/course/'
    },
    courseUpdate: {
        type: 'post',
        link: '/admin/ajax/course/'
    },

    courseInsert: {
        type: 'put',
        link: '/admin/ajax/courseinsert/'
    },

    courseDelete: {
        type: 'delete',
        link: '/admin/ajax/coursedelete/'
    },

}