##工厂模式  
为了不用手动的去实例化一个类, 所以我们需要一个固定的类来帮我们实现, 我们称之为工厂。

工厂模式又分工厂方法模式和抽象工厂模式两种。  

#工厂方法模式  
假设我们有产品A和产品B, 我们需要一个工厂来帮我们产出A或者B, 这时我们只需要告诉工厂我们需要产品A,  
让工厂内部给我们产出一个A就OK了，不需要我们自己动手, 这就是简单的工厂方法模式。
![简单工厂](https://sourcemaking.com/files/v2/content/patterns/Factory_Method-2x.png "简单工厂模式")
![简单工厂](https://sourcemaking.com/files/v2/content/patterns/Factory_Method_1-2x.png "简单工厂方法模式")

#抽象工厂模式
>假设我们需要一套家居, 其中包括柜子、椅子等, 有人说我想要一套红色的家居, 怎么办, 于是我们想出了这样的方法,
加一个造柜子工序的接口, 一个造红色柜子, 一个造绿色柜子,椅子也一样, 加一个工厂的接口, 分出两个工厂来, 一个
负责造红色的家居, 一个负责造绿色的家居, 这样我们直接让红色工厂给我们造出一套红色家具就OK了。
![抽象工厂](http://img.blog.csdn.net/20130713161546250?watermark/2/text/aHR0cDovL2Jsb2cuY3Nkbi5uZXQvTG92ZUxpb24=/font/5a6L5L2T/fontsize/400/fill/I0JBQkFCMA==/dissolve/70/gravity/SouthEast)