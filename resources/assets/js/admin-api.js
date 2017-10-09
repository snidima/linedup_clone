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
        link: '/admin/ajax/lesson-insert'
    },
    lessonDelete: {
        type: 'delete',
        link: '/admin/ajax/lesson-delete/'
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
        type: 'post',
        link: '/admin/ajax/course-insert'
    },

    courseDelete: {
        type: 'delete',
        link: '/admin/ajax/course-delete/'
    },


    courseComposition:{
        type: 'get',
        link: '/admin/ajax/course-composition',
    }

}