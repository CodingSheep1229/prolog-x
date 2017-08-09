enchant();
var rand = function(num) {
    return Math.floor(Math.random() * num);
}

window.onload = function() {
    var game = new Core(1000, 500);
    var gameStart = false;
    game.fps = 24;
    game.score = 0;
    game.keybind(65, 'left');
    game.keybind(68, 'right');
    game.keybind(87, 'up');
    game.keybind(69, 'down');
    var bullet = 5;
    var protect = 1;
    var protectTime = 0;
    var beProtected = false;
    setInterval(function() {
        if (gameStart == true) {
            bullet++;
            bulletLabel.text = "Bullet : " + bullet;
        }
    }, 1800);
    setInterval(function() {
        if (gameStart == true) {
            protect++;
            protectLabel.text = "Protect : " + protect;
        }
    }, 30000);
    //score board
    scoreLabel = new Label("Score : " + game.score);
    scoreLabel.x = 5;
    scoreLabel.y = 5;
    scoreLabel.color = "white";
    //score board
    //bullet board
    bulletLabel = new Label("Bullet : " + bullet);
    bulletLabel.x = 5;
    bulletLabel.y = 30;
    bulletLabel.color = "white";
    //bullet board
    //protect board
    protectLabel = new Label("Protect : " + protect);
    protectLabel.x = 5;
    protectLabel.y = 55;
    protectLabel.color = "white";
    //protect board
    protectTimeLabel = new Label("ProtectTime : " + protectTime);
    protectTimeLabel.x = 5;
    protectTimeLabel.y = 80;
    protectTimeLabel.color = "white";

    game.preload("prolog-x/game/book.jpg");
    game.preload("prolog-x/game/hanwei.jpg");
    game.preload("prolog-x/game/question.jpg");
    game.preload("prolog-x/game/question2.jpg");
    game.preload("prolog-x/game/rock.jpg");
    game.preload("prolog-x/game/bigbook.jpg");
    game.onload = function() {
        game.rootScene.backgroundColor = 'black';
        //bear
        var right = true;
        var left = false;
        var weaponBool = false;
        var bigbookLife = 5;
        var Bear = enchant.Class.create(enchant.Sprite, {
            initialize: function() {
                enchant.Sprite.call(this, 50, 100);
                this.image = game.assets["prolog-x/game/hanwei.jpg"];
                this.x = 0;
                this.y = 400;
                game.rootScene.addChild(this); // canvas

                var jump = false;
                var jump2 = false;
                var beProtected2 = false;
                this.addEventListener(enchant.Event.ENTER_FRAME, function() {
                    if (gameStart == true) {
                        if (game.input.right) {
                            if (left == true) {
                                this.tl.scaleTo(1, 1, 1);
                                left = false;
                            }
                            right = true;
                            this.x += 5;
                            this.frame = this.age % 2 + 6;
                        }
                        if (game.input.left) {
                            if (right == true) {
                                this.tl.scaleTo(-1, 1, 1);
                                right = false;
                            }
                            left = true;
                            this.x -= 5;
                            this.frame = this.age % 2 + 6;
                        }
                        if (game.input.up && jump == false) {
                            jump = true;
                            jump2 = true;
                        }
                        if (game.input.down) {
                            if (protect > 0 && beProtected2 == false) {
                                game.rootScene.addChild(protectTimeLabel);
                                beProtected = true;
                                beProtected2 = true;
                                protect -= 1;
                                protectTime = 5;
                                protectLabel.text = "Protect : " + protect;
                                protectTimeLabel.text = "ProtectTime : " + protectTime;

                                myTime = setInterval(function() {
                                    protectTime -= 1;
                                    protectTimeLabel.text = "ProtectTime : " + protectTime;
                                }, 1000);

                                var timeoutID3 = setTimeout(function() {
                                    beProtected = false;
                                    beProtected2 = false;
                                    game.rootScene.removeChild(protectTimeLabel);
                                    clearInterval(myTime);
                                    protectTime = 0;
                                }, 5000);
                            }
                        }
                    }
                    if (jump2 == true) {
                        jump2 = false;
                        this.tl.moveBy(0, -100, 5).moveBy(0, -40, 6).moveBy(0, 40, 6).moveBy(0, 100, 5);

                        function change() {
                            jump = false;
                        }
                        var timeoutID = setTimeout(change, 850);
                    }
                    if (this.x > 1000)
                        this.x = 0;
                    else if (this.x < 0)
                        this.x = 999;
                });
            }
        });
        //bear
        //punch
        var Apple = enchant.Class.create(enchant.Sprite, {
            initialize: function() {
                enchant.Sprite.call(this, 32, 50);
                this.image = game.assets['prolog-x/game/question.jpg']; // set image
                this.frame = 15; // set image data
                if (true) {
                    this.moveTo(bear.x + 50, bear.y + 8); // move to the position
                    this.tl.moveBy(1100, 0, 50);
                }
                this.addEventListener('enterframe', function() {
                    if (this.x > 1100 || this.x < 1) {
                        game.rootScene.removeChild(this);
                    }
                })
                if (gameStart == true)
                    game.rootScene.addChild(this); // canvas
            }
        });
        //enemy
        var Enemy = enchant.Class.create(enchant.Sprite, {
            initialize: function() {
                enchant.Sprite.call(this, 50, 50);
                this.image = game.assets["prolog-x/game/book.jpg"];
                this.frame = 5;
                this.y = 400 - rand(120);
                this.x = 1000;
                this.speed = 10 - rand(9);
                this.addEventListener('enterframe', function() {
                    this.x -= this.speed;
                    if (this.x < 0) {
                        game.rootScene.removeChild(this);
                        if (gameStart == true)
                            game.end();
                    }
                })
                if (gameStart == true)
                    game.rootScene.addChild(this); // canvas
            }
        });

        var Enemy2 = enchant.Class.create(enchant.Sprite, {
            initialize: function() {
                enchant.Sprite.call(this, 50, 50);
                this.image = game.assets["prolog-x/game/book.jpg"];
                this.frame = 5;
                this.y = rand(100);
                this.x = 1000;
                this.speed = 5;
                this.addEventListener('enterframe', function() {
                    this.x -= this.speed;
                    this.tl.moveBy(0, 300, 50).moveBy(0, -300, 50);
                    if (this.x < 0) {
                        game.rootScene.removeChild(this);
                        if (gameStart == true)
                            game.end();
                    }
                })
                if (gameStart == true)
                    game.rootScene.addChild(this); // canvas
            }
        });

        var Enemy3 = enchant.Class.create(enchant.Sprite, {
            initialize: function() {
                enchant.Sprite.call(this, 100, 100);
                this.image = game.assets["prolog-x/game/bigbook.jpg"];
                this.frame = 5;
                this.life = 5;
                this.y = 400 - rand(100);
                this.x = 1000;
                this.speed = 2;
                this.addEventListener('enterframe', function() {
                    this.x -= this.speed;
                    if (this.x < 0) {
                        game.rootScene.removeChild(this);
                        if (gameStart == true)
                            game.end();
                    }
                })
                if (gameStart == true)
                    game.rootScene.addChild(this); // canvas
            }
        });

        var Rock = enchant.Class.create(enchant.Sprite, {
            initialize: function() {
                enchant.Sprite.call(this, 30, 50);
                this.image = game.assets["prolog-x/game/rock.jpg"];
                this.frame = 2;
                this.y = 0;
                this.x = rand(1000);
                this.speed = 10 - rand(9);
                this.addEventListener('enterframe', function() {
                    this.y += this.speed;
                    if (this.x < 0) {
                        game.rootScene.removeChild(this);
                    }
                })
                if (gameStart == true)
                    game.rootScene.addChild(this); // canvas
            }
        });

        var Weapon = enchant.Class.create(enchant.Sprite, {
            initialize: function() {
                enchant.Sprite.call(this, 30, 50);
                this.image = game.assets["prolog-x/game/question2.jpg"];
                this.frame = 5;
                this.y = 0;
                this.x = rand(700);
                this.speed = 5 - rand(4);
                this.addEventListener('enterframe', function() {
                    this.y += this.speed;
                    if (this.x < 0) {
                        game.rootScene.removeChild(this);
                    }
                })
                if (gameStart == true)
                    game.rootScene.addChild(this); // canvas
            }
        });
        var bear = new Bear();
        setInterval(function() { var enemy = new Enemy(); }, 2000);
        setInterval(function() { var enemy2 = new Enemy2(); }, 5000);
        setInterval(function() { var rock = new Rock(); }, 5000);
        setInterval(function() { var weapon = new Weapon(); }, 10000);
        setInterval(function() { var enemy3 = new Enemy3(); }, 25000);

        game.rootScene.on('touchstart', function(evt) {
            if (bullet > 0) {
                bullet -= 1;
                var apple = new Apple();
                bulletLabel.text = "Bullet : " + bullet;
            }
        });

        game.rootScene.on('enterframe', function() {
            var hits = Apple.intersect(Enemy);
            for (var i = 0, len = hits.length; i < len; i++) {
                if (weaponBool == false) {
                    game.rootScene.removeChild(hits[i][0]);
                    game.rootScene.removeChild(hits[i][1]);
                } else {
                    game.rootScene.removeChild(hits[i][1]);
                }
                if (bear.x > 500) {
                    game.score += 2;
                } else {
                    game.score++;
                }
                scoreLabel.text = "Score : " + game.score;
            }
            var hits2 = Bear.intersect(Enemy);
            for (var i = 0, len = hits2.length; i < len; i++) {
                if (gameStart == true) {
                    if (beProtected == true) {
                        game.rootScene.removeChild(hits2[i][1]);
                    } else {
                        game.rootScene.removeChild(hits2[i][0]);
                        game.rootScene.removeChild(hits2[i][1]);
                        game.end();
                    }
                }
            }
            var hits3 = Apple.intersect(Enemy2);
            for (var i = 0, len = hits3.length; i < len; i++) {
                if (weaponBool == false) {
                    game.rootScene.removeChild(hits3[i][0]);
                    game.rootScene.removeChild(hits3[i][1]);
                } else {
                    game.rootScene.removeChild(hits3[i][1]);
                }
                if (bear.x > 500) {
                    game.score += 2;
                } else {
                    game.score++;
                }
                scoreLabel.text = "Score : " + game.score;
            }
            var hits4 = Bear.intersect(Enemy2);
            for (var i = 0, len = hits4.length; i < len; i++) {
                if (gameStart == true) {
                    if (beProtected == true) {
                        game.rootScene.removeChild(hits4[i][1]);
                    } else {
                        game.rootScene.removeChild(hits4[i][0]);
                        game.rootScene.removeChild(hits4[i][1])
                        game.end();
                    }
                }
            }
            var hits5 = Bear.intersect(Rock);
            for (var i = 0, len = hits5.length; i < len; i++) {
                if (gameStart == true) {
                    if (beProtected == true) {
                        game.rootScene.removeChild(hits5[i][1]);
                    } else {
                        game.rootScene.removeChild(hits5[i][0]);
                        game.rootScene.removeChild(hits5[i][1]);
                        game.end();
                    }
                }
            }
            var hits6 = Bear.intersect(Weapon);
            for (var i = 0, len = hits6.length; i < len; i++) {
                if (gameStart == true) {
                    game.rootScene.removeChild(hits6[i][1]);
                    weaponBool = true;
                    setTimeout(function() { weaponBool = false; }, 5000);
                }
            }
            var hits7 = Apple.intersect(Enemy3);
            for (var i = 0, len = hits7.length; i < len; i++) {
                game.rootScene.removeChild(hits7[i][0]);
                bigbookLife -= 1;
                if (bigbookLife == 0) {
                    game.rootScene.removeChild(hits7[i][1]);
                    bigbookLife = 3;
                }
                if (bear.x > 500) {
                    game.score += 6;
                } else {
                    game.score += 3;
                }
                scoreLabel.text = "Score : " + game.score;
            }
            var hits8 = Bear.intersect(Enemy3);
            for (var i = 0, len = hits8.length; i < len; i++) {
                if (gameStart == true) {
                    if (beProtected == true) {
                        game.rootScene.removeChild(hits8[i][1]);
                    } else {
                        game.rootScene.removeChild(hits8[i][0]);
                        game.rootScene.removeChild(hits8[i][1]);
                        game.end();
                    }
                }
            }
        });
    };
    var hello = new Label("click the mouse to start");
    hello.x = 400;
    hello.y = 250;
    hello.font = 'italic bold 22px sans-serif';
    hello.color = "white";
    game.rootScene.addChild(hello);
    game.rootScene.on('touchstart', function() {
        game.rootScene.removeChild(hello);
        game.rootScene.addChild(scoreLabel);
        game.rootScene.addChild(bulletLabel);
        game.rootScene.addChild(protectLabel);
        gameStart = true;
    })
    game.start();
};
