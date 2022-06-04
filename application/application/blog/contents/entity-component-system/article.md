## What is Entity Component System?

Entity Component System (ECS) is a software pattern commonly used in game development. It is designed to take full advantage of a computer’s hardware to maximize performance, whilst also providing the programmer with a structured, modular, and reusable environment.

ECS, as it's name suggests, comprises three parts: entities, components, and systems. Each of these three parts have their own purpose and responsibilities within an ECS framework, and interact with each other in their own ways.

![ECS Parts](%CNTNT%/figure1.png)
> **Figure 1** - ECS Parts

*Figure 1* visualises the three components.

## Example

ECS is often used as an alternative to the traditional object oriented approach to software development. Although both ECS and OOP can be used alongside each other, let's have a look at an example where we use and compare both methods as alternatives. Consider a 2D platformer with the following features:

* A player controlled by a mouse and keyboard.
* A static tree.
* Two zombies controlled by AI.

### What Would this Look Like in OOP?

In object oriented programming, data and functionality are kept tightly encapsulated within classes, promoting inheritance like in the following diagram:

![Our Example Game Using OOP](%CNTNT%/figure2.png)
> **Figure 2** - Our Example Game Using OOP

We define a class, `GameObject` which contains all the functionality and data that is common between our features. This class could look something like this:

    class GameObject
    {
        public Sprite sprite;
        public float  x;
        public float  y;

        public void Render()
        {
            ...
        }
    }

All of our features, the player, a tree, and the zombies, require an x and y position, and a sprite to visualise them; as well as a function used to render the object to the screen. Since our tree object would not require any additional data or functionality, we could instantiate the `GameObject` class to represent the tree.

The remaining player and zombie features would need some extra functionality. For this, we would define a class for each. The player would be represented by the `Player` class.

    class Player : GameObject
    {
        public int health;

        public void OnInput()
        {
            ...
        }
    }

The player would inherit the position and sprite properties from it's parent class, and then define the additional data and functionality it needs in it's own class. The player in our game would be represented by an instance of the `Player` class.

The two zombies would be similar, each being represented by an instance of the `Zombie` class.

    class Zombie : GameObject
    {
        public int xp;

        public void OnUpdate()
        {
            ...
        }
    }

Any data specific to a zombie, such as xp earned when killed, will be in the `Zombie` class. Object oriented programming promotes inheritence, which uses an "is-a" relationship between classes.

### What Would this Look Like in ECS?

Entity component systems take a slightly different approach to defining objects. Whereas OOP keeps data and logic together in classes, ECS seperates data into small, reusable components, and logic into small, reusable systems.

*Figure 3* shows how our game will be structured in ECS.

![Our Example Game Using ECS](%CNTNT%/figure3.png)
> **Figure 2** - Our Example Game Using ECS

### Entities

An entity is an individual object in the world. Whereas in OOP, objects are instances of a class, in ECS, an entity is just a unique integer. The purpose of this integer is simply to distinguish between entities. The four entities in our game would be:

* `entity = 0` represents the player.
* `entity = 1` represents the tree.
* `entity = 2` represents the first zombie.
* `entity = 3` represents the second zombie.

The entity itself contains no data or functionality; it is just an integer used as identification.

### Components

All the data associated with an entity is seperated into small, generic, and reusable components.

Below are some example components:

* Position
* Sprite
* Health
* AI
* PlayerInput

Where possible, components should only contain primitive data types like integers or floats. For example, the following code represents the Position component:

    public struct Position
    {
        public float x;
        public float y;
    }

Components are lightweight data containers that define the attributes and state of an entity. They contain no functionality, just data. Considering the four entities in our game, they would have the following components:

* `entity = 0` would have the Position, Sprite, Health, and PlayerInput components.
* `entity = 1` would have the Position, and Sprite components.
* `entity = 2` would have the Position, Sprite, and AI components.
* `entity = 3` would have the Position, Sprite, and AI components.

By having primitive values, components can be stored and iterated over extremely efficiently by being contigous in memory.

### Systems

Systems bring the game to life. They operate on the components attached to an entity to produce changes in the world. Some example systems could be:

* RenderSystem - Uses the Position and Sprite components.
* HealthSystem - Uses the Health component.
* PlayerMovementSystem - Uses the Position and PlayerInput components.

In a typical program using an ECS, each system will run once per frame. The following code example shows what the RenderSystem update function could look like:

    foreach (int e in GetEntities<Position, Sprite>())
    {
        var p = GetComponent<Position>(e);
        var s = GetComponent<Sprite>(e);

        render(s.sprite, p.x, p.y);
    }

The foreach loop would iterate over all entities that have both the Posiiton, and Sprite components. In our game, all features have these. The components are then requested, and the data is then used.

## Conclusion

Hopefully, this article has successfully introduced the basic concepts of ECS.