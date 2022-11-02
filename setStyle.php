<!DOCTYPE html>
<html>

<head>
    <!-- Google Fonts CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bai+Jamjuree:wght@300;400&display=swap" rel="stylesheet">
    
    <style type="text/css">
        body{ 
            min-height: 100vh; 
            margin:0; 
        }
        header{ 
            min-height:50px; 
        }
        footer{ 
            min-height:50px; 
        }
                
        .flex-container {
            display: flex;
            flex-wrap: wrap;
            text-align: center;
        }

        .flex-item-left {
            background-color: #c0c0c0;
            padding: 5px;
            flex: 50%;
        }

        .flex-item-right {
            background-color: #212529;
            padding: 5px;
            flex: 50%;
        }

        @media (max-width: 800px) {
            .flex-item-right, .flex-item-left {
                flex: 100%;
            }
        }

        .background-all {
            background-color: #30363d;
            font-family: 'monospace' ,'Bai Jamjuree' ,sans-serif;
        }

        .table-row{
            background-color: #ffc007;
            color: #212529;
        }

        .foot-credit {
            font-size: 10px;
        }

        #con {
            display: inline-block;
            padding: 1vw 1vw;
        }
        .glow {
            animation: glow 1s ease-in-out infinite alternate;
        }

        @-webkit-keyframes glow {
            from {
                text-shadow: 0 0 10px #ffc007, 0 0 20px #ffc007, 0 0 30px #fffa2d, 0 0 40px #fffa2d;
            }
            
            to {
                text-shadow: 0 0 20px #ffc007, 0 0 30px #c0c0c0, 0 0 40px #fffc77, 0 0 50px #fffc77;
            }
        }

        .divtext {
            display: table;
        }
        .mins {
            width: 60%;
        }
        @media screen and (max-width: 300px) {
            .mins {
                width: 180px;
            }
        }
        @media screen and (min-width: 300px) {
            .divtext {
                font-size: 16px;
            }
        }
        @media screen and (min-width: 400px) {
            .divtext {
                font-size: 18px;
            }
        }
        @media screen and (min-width: 450px) {
            .divtext {
                font-size: 20px;
            }
        }
        @media screen and (min-width: 500px) {
            .divtext {
                font-size: 22px;
            }
        }
        @media screen and (min-width: 550px) {
            .divtext {
                font-size: 24px;
            }
        }
        @media screen and (min-width: 600px) {
            .divtext {
                font-size: 28px;
            }
        }
        @media screen and (min-width: 700px) {
            .divtext {
                font-size: 32px;
            }
        }
        @media screen and (min-width: 800px) {
            .divtext {
                font-size: 22px;
            }
        }
        @media screen and (min-width: 1000px) {
            .divtext {
                font-size: 28px;
            }
        }
        @media screen and (min-width: 1200px) {
            .divtext {
                font-size: 34px;
            }
        }
        @media screen and (min-width: 1200px) {
            .divtext {
                font-size: 40px;
            }
        }
        
        
        
        
        
        
        


    </style>
</head>
<body>
</body>

</html>