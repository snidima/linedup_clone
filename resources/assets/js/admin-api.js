export default {
    lessons: {
        type: 'post',
        link: '/administrator/ajax/lessons'
    },
    lessonShow: {
        type: 'get',
        link: '/administrator/ajax/lesson/'
    },
    lessonUpdate: {
        type: 'post',
        link: '/administrator/ajax/lesson/'
    },
    lessonInsert: {
        type: 'post',
        link: '/administrator/ajax/lesson-insert'
    },
    lessonDelete: {
        type: 'delete',
        link: '/administrator/ajax/lesson-delete/'
    },


    courses: {
        type: 'post',
        link: '/administrator/ajax/courses'
    },
    courseShow: {
        type: 'get',
        link: '/administrator/ajax/course/'
    },
    courseUpdate: {
        type: 'post',
        link: '/administrator/ajax/course/'
    },

    courseInsert: {
        type: 'post',
        link: '/administrator/ajax/course-insert'
    },

    courseDelete: {
        type: 'delete',
        link: '/administrator/ajax/course-delete/'
    },


    courseComposition:{
        type: 'get',
        link: '/administrator/ajax/course-composition',
    },
    courseCompositionSave:{
        type: 'post',
        link: '/administrator/ajax/course-composition-save',
    }

}