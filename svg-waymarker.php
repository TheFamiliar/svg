<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
    }

    .container {
        display: flex;
        flex: 1;
    }

    main {
        flex: 1;
    }

    aside {
        flex: 0 0 12em;
    }

    svg {
        width: 100vw;
        height: 100vh;
        padding-top: 30vh;
        position: fixed;
    }

    </style>
</head>

<body>
    <div class="container">

        <main>
            <?php foreach (range(1, 10) as $i): ?>
            <article id="section-<?=$i?>">
                <h2>Section <?=$i?></h2>
                <?php foreach (range(0, 10) as $j): ?>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                <?php endforeach; ?>
            </article>
            <?php endforeach; ?>
        </main>


        <aside>
            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"></svg>
        </aside>
    </div>

    <footer>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit.
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/snap.svg/0.4.1/snap.svg-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/3.1.1/noframework.waypoints.min.js"></script>
    <script>
    (function() {
        var els = document.getElementsByTagName('article');

        if (! els.length) {
            return;
        }

        var s = Snap('svg');
        var totalDistance = 100;
        var distanceEach = 100 / els.length;

        Snap.load('shape.svg', function (f) {
            var p = f.select('path');
            s.append(p);
        });

        var animate = function (num) {
            var tri = s.select('path');

            if (num < 1 || typeof num == 'undefined') {
                return;
            }

            tri.animate({
                d: "M-111,147 L147,147 L" + (95 - distanceEach * num) + ",112 L-111,147 L-111,147 Z"
            }, 1000, mina.linear);
        };

        setTimeout(animate, 500);


        for (var i = 1; i < els.length; ++i) {
            new Waypoint({
                element: els[i],
                handler: function() {
                    animate(this.element.id.split('-').pop());
                },
                offset: '15%'
            });
        }
    }());

    </script>

</body>
</html>