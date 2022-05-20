## What is Entity Component System?

Entity Component System (ECS) is a software pattern commonly used in game development. It is designed to take full advantage of a computer’s hardware to maximize performance, whilst also providing the programmer with a structured, modular, and reusable environment.

ECS, as it's name suggests, comprises three parts: entities, components, and systems. Each of these three parts have their own purpose and responsibilities within an ECS framework, and interact with each other in their own ways.

![ECS Parts](%CNTNT%/figure1.png)
> **Figure 1** - ECS Parts

## Example

ECS is often used as an alternative to the traditional object oriented approach to software development. Although both ECS and OOP can be used together, let's have a look at an example where we use and compare both methods as alternatives. Consider a 2D platformer with the following features:

* A player controlled by a mouse and keyboard.
* A static tree.
* Two zombies controlled by AI.

### What Would this Look Like in OOP?

In object oriented programming, data and functionality are kept tightly encapsulated within classes, promoting inheritance like in the following diagram:

![Our Example Game Using OOP](%CNTNT%/figure2.png)
> **Figure 1** - Our Example Game Using OOP

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

All of our features, the player, a tree, and the zombies, require an x and y position, and a sprite to visualise them; as well as a function used to render the object to the screen. Since our tree object would not require any additional data or functionality, we could instantiate the `GameObject` class to represent the tree object.

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
        public void OnUpdate()
        {
            ...
        }
    }


is a and has a relationships.

Inheritance diagram for some classes
Here, a parent GameObject class contains all common data and functionality. Different classes would inherit and override this.

What Would this Look Like in ECS?
ECS doesn’t keep data and functionality coupled together in classes, nor does it use inheritance. Instead, it seperates them like in the diagram below:


Three parts to ECS
All data is seperated into small, specialised components, and all functionality and logic is kept in specialised systems. The entity is an identifier that binds everything together.

Following is a more detailed description of the three concepts of ECS.

Entity
An entity is an individual object in the world. The following diagram shows the four entities in our game:


The four entities in our game
In a program using ECS, each entity is represented by a unique integer id. The entity itself contains no data or functionality; it is just an integer.

Components
All the data associated with an entity is seperated into small, generic, and reusable components.

Below are eight example components:


Some example components
Each component is specific, independent, and usually contains only primitive data types like integers or floats.

For example, the following code represents the Position component:

1.   public struct Position
2.   {
3.       public float x;
4.       public float y;
5.   }
Components are lightweight data containers that define the attributes and state of an entity. They contain no functionality, just data.

The following diagram shows the four entities in our game alongside the components attached to them.


Each entity and their components
All four entities have a Position and Render component. Entity 0, 1, and 2 have a Physics component, but entity 3 does not. Entity 0 has a PlayeInput component and entity 1 and 2 have an AI component.

Components on there own just store data. They do not contain any methods and do not have any functionality. How the variables in a component are interpreted is not the concern of the component.

Component Array
As mentioned, entities are just integers that don’t need to be stored anywhere. Components, however, do need to be stored in memory and are usually stored in arrays like in the following diagram:


Components array for Position and Render
Each component type will have its own one dimensional array with each instance of a component being stored contiguous to the next.

The relationship between the entity id and the component array depends heavily on how the ECS is implemented. Often, the entity id maps either directly or indirectly to the index of the array that the entity’s component is located.

For example the Position component attached to entity 35 will be at index 35 in the Position components array.

Systems
Systems bring the game to life. They operate on the components attached to an entity to produce changes in the world.

The following diagram shows four example systems:


Example systems
Each system is updated once per frame. During this, a set of entities, which are selected according to some filter, are iterated, and their attached components are modified.

Take the GravitySystem for example. Its requirements are that an entity has an attached Position and Physics component. The following code demonstrates what the update loop could look like:

1.   foreach (int e in GetEntities<Position, Physics>())
2.   {
3.       Physics  phy = physics[e];
4.       Position pos = position[e];
5.
6.       phy.velocity_y -= 9.81f;
7.       pos.y += phy.velocity_y;
8.   }
(This code is for demonstration purposes and will not compile)

Line 1 iterates over every entity that has the required Position and Physics components.
Line 3 and 4 grabs the instances of each component belonging to the current entity from the relevant component arrays.
Line 6 and 7 modify the component instances.
The GravitySystem will only work on entities that have the required components, which in our game, is entity 0, 1, and 2. Entity 3 does not have an attached Physics component and so is not used by the GravitySystem.

Like components, systems are specific. The GravitySystem applies gravity. A RenderSystem renders entities with a Position and Render component. A HealthRegenSystem regenerates the health of entities with a Health component.

Conclusion
Hopefully, this article has successfully introduced the basic concepts of ECS.

Actually implementing an ECS can be a challenge. Fortunately, there are lots of resources online that can help with this. Below are some that I used.