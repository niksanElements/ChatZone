require.config({
    baseUrl: 'content/js/models/chat',

    paths:{
        'jQuery': '../../libs/jquery',
        'main' : 'main',
        'friends':'friends',
        'send': 'send',
        'newMessages':'newMessages'
    }
});

require(['main']);