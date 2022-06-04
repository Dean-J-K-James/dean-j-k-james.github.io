## Generating Caves and Dungeons Using Random Walk

Procedural cave and dungeon generation is a common feature in game development; whether it be a 2D top-down dungeon crawler, or a 3D voxel first person shooter, procedurally generated caves and dungeons add varied, unique environments for the player to experience.

![Example Cave Generated Using Random Walk](%CNTNT%/figure1.png)
> **Figure 1** - Example Cave Generated Using Random Walk

There are countless algorithms and techniques that can be used to generate caves, but perhaps the simplest is a random walk. The random walk algorithm can be used to quickly create fully connected, random looking caves of varying size and shape. It works by repeatedly traversing a grid in random directions, turning cells that are passed into a path. Once the random walk is done, the results will look similar to those in *Figure 1*.

## Algorithm

There are a few ways to implement a random walk, such as using queues, stacks, or recursion. We're just going to use a simple loop though, resulting in the following pseudo code:

    Set all cells to a wall
    Set active cell to the centre cell
    Loop x times:
        Set active cell to a path
        Pick random neighbour of active cell and make it the new active cell

The active cell is just a (x, y) coordinate used to keep track of where in the grid we are.

## Implementation

<div class="tip">All code shown in this tutorial is pseudo code, however, it should be relatively easy to translate into another language. Click the link under the interactive demo to see a JavaScript implementation of the code.</div>

We begin by defining a function, `random_walk`, which controls the execution of the algorithm.

    function random_walk() {
        initialise();
        for (let i = 0; i < 2000; i++) {
            iterate_random_walk();
        }
    }

This function first calls `initialise`, which sets up the active cell coordinates, and defaults each cell in the grid to a wall.

The rest of the algorithm needs to be repeated a fixed number of times, so we are going to use a for loop that performs 2000 iterations. This example iterates 2000 times, which in my tests, produces good sized caves on a 50x50 grid. More iterations will produce larger caves, and are more suitable for larger grids. Generally, the number of iterations should be enough such that the cave spreads across the grid, but not so many that it ends up simply filling the space. Try experimenting with different numbers.

On each iteration, we call the `iterate_random_walk` function. This creates a path, and chooses the next active cell.

### Initialise

To initialise, we first set all cells in our grid to a wall, using the function `set_all_cells`. The values `"wall"` and `"path"` represent the state of a cell. They could be an integer, a string, or object; it all depends on how you are implementing your grid. `set_all_cells` simply iterates the cells in the grid using a two-dimensional for loop, setting them all to a wall.

Next, need to setup the active cell. For this, we use `x` and `y` to represent it's position, and by default, they are initialised to the centre of the grid. The starting active cell will be the first cell in the grid to be a path; it is also the only cell guaranteed to be a path. This could be used as a player spawn point.

    function initialise() {
        set_all_cells("wall");

        x = floor(sizex / 2);
        y = floor(sizey / 2);
    }

The variables, `sizex` and `sizey` represent the width and height of our grid in cells.

Since this algorithm is entirely random, there is no way to predict, nor are there any restrictions on, the direction the active cell will take. To get the best coverage of the grid, the centre cell is chosen as the starting active cell. This doesn't have to be the case though. To get an even more random cave system, the starting active cell could be completely random.

### Iterate Random Walk

The `iterate_random_walk` function gets repeatedly called by `random_walk`. On each call, a single cell gets set to a path, and the active cell's position gets updated.

    function iterate_random_walk() {
        set_cell(x, y, "path");

        switch (floor(random() * 4)) {
            case 0: y--; break;
            case 1: x++; break;
            case 2: y++; break;
            case 3: x--; break;
        }

        x = max(1, min(x, sizex - 2));
        y = max(1, min(y, sizey - 2));
    }

First thing is to set the active cell to a path using the `set_cell` function. Remember that the `x` and `y` variables represent the active cell. Once set to a path, the active cell needs to change. As required in the algorithm, the next active cell must be a random neighbour of the current active cell. A switch statement based on a randomly generated number between 0 and 3 increments/ decrements the relevant axis. Each of the 4 directions corresponds to one of north, east, south or west.

Once the switch has been run, one of the `x` and `y` coordinates of the active cell will have changed. Because the direction is random, it is possible that the new active cell is already a path. This is fine, though, as it keeps the cave size random.

Our grid is finite, with a fixed width and height. As the active cell is traversing the grid on each iteration, we need to validate it is within the bounds of the grid. This is done by clamping the coordinates using the `min` and `max` functions. Most languages will have these functions readily available.

## Keeping the Cave Random

Throughout each call of the `iterate_random_walk` function, the data is never quality tested. The only validation is clamping the coordinates so that our array indexes dont overflow. This lack of quality assurance can result in two things:

* The next active cell is already a path. This is desirable because it keeps the size of the cave random and unpredictable.
* If the active cell is already at the edge of the grid, there is a 25% chance of the next coordinate being clamped and therefore not changing. This can cause the undesirable effect of having our path "stick" to an edge, like in *Figure 2*. To fix this, we could make sure to choose only valid directions in the switch statement.

![Cave Sticking to Edge of Grid](%CNTNT%/figure2.png)
> **Figure 2** - Cave Sticking to Edge of Grid

## Conclusion

The random walk algorithm is a very simple and easy technique to use. In reality, the caves it generates are not necessarily perfect for an actual game, because it's heavy reliance on random numbers can result in wierd looking worlds.

## Further Reading

* The RogueBasin wiki has a page, [Random Walk Cave Generation](http://www.roguebasin.com/index.php?title=Random_Walk_Cave_Generation), which demonstrates similar ideas to this article.
* Mozilla web docs have a page describing [Tilemaps](https://developer.mozilla.org/en-US/docs/Games/Techniques/Tilemaps) for web development. Some of the concepts can be transferred to tilemaps in non-web environments.