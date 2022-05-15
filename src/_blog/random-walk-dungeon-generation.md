---
name: Random Walk Dungeon Generation
slug: random-walk-dungeon-generation
desc: Generate random, unpredictable caves and dungeons on a 2D tilemap using the random walk algorithm.
date: 2022-01-05
type: cellular-automata
demo: true
---

## What is Random Walk?

Procedural cave and dungeon generation is a fundamental aspect of many games and applications. Whether it be a 2D top-down dungeon crawler, or a 3D voxel first person shooter, procedurally generated caves and dungeons add varied, unique environments for the player to experience.

{% include blog-figure.md figure=1 title="Cave Generated Using the Random Walk Algorithm." %}

The random walk algorithm is a simple method that can be used to quickly create fully connected, random looking caves of varying size and shape. It works by repeatedly traversing a grid in random directions, turning cells that are passed into a path. Once the random walk is done, the results will look similar to those in *Figure 1*.

<tip>The implementation and rendering of a grid is not shown in this tutorial, but many tutorials exist for creating tilemaps in various languages and engines.</tip>

## Algorithm

The algorithm consists of a few steps. First, the grid and variables are initialised, and then the path is generated in a loop of fixed size.

    Set all cells to a wall
    Set active cell to the centre cell
    Loop x times:
        Set active cell to a path
        Pick random neighbour of active cell and make it the new active cell

## Implementation

We begin by defining a function, `random_walk` , which controls the execution of the algorithm.

    random_walk() {
        this.initialise();
        for (let i = 0; i < 2000; i++) {
            this.iterate_random_walk();
        }
    }

This function first calls `initialise` , which sets up the active cell coordinates, and defaults each cell in the grid to a wall. The details of this function are shown later.

The rest of the algorithm needs to be repeated a fixed number of times, so we are going to use a for loop that performs 2000 iterations. This example iterates 2000 times, which in my tests, produces good sized caves on a 50x50 grid. More iterations will produce larger caves, and are more suitable for larger grids. Generally, the number of iterations should be enough such that the cave spreads across the grid, but not so many that it ends up simply filling the space. Try experimenting with different numbers.

On each iteration, we call the `iterate_random_walk` function. This creates a path, and chooses the next active cell.

<tip>The term "active" cell is simply a label we are giving to the cell that is currently being evaluated. There is nothing special or different about the cell itself.</tip>

## Initialise

To initialise our algorithm, we first need to setup the active cell. For this, we use `x` and `y` to represent it's position, and by default, they are initialised to the centre of the grid. The starting active cell will be the first cell in the grid to be a path; it is also the only cell guaranteed to be a path. This could be used as a player spawn point.

    initialise() {
        this.sizex = 50;
        this.sizey = 50;

        this.x = Math.floor(this.sizex / 2);
        this.y = Math.floor(this.sizey / 2);

        this.set_all_cells(this.wall);
    }

The variables, `sizex` and `sizey` represent the width and height of our grid in cells.

Since this algorithm is entirely random, there is no way to predict, nor are there any restrictions on, the direction the active cell will take. To get the best coverage of the grid, the centre cell is chosen as the starting active cell. This doesn't have to be the case though. To get an even more random cave system, the starting active cell could be completely random.

We next initialise all cells in our grid to a wall, using the function `set_all_cells` . The variables `wall` and `path` represent the state of a cell. They could be an integer, a string, or object; it all depends on how you are implementing your grid.

## Set All Cells

The function `set_all_cells` sets all cells in the grid to the cell type that is passed. The `initialise` function passes the `wall` type. Two for-loops are used to iterate every cell.

    set_all_cells(cell_type) {
        for (let x = 0; x < this.sizex; x++) {
            for (let y = 0; y < this.sizey; y++) {
                this.set_cell(x, y, cell_type);
            }
        }
    }

The function `set_cell` sets the cell located at `x` , `y` , to the passed cell type. It isn't impemented in this tutorial, and is dependant on how you handle tilemaps.

## Iterate Random Walk

The `iterate_random_walk` function gets repeatedly called by `random_walk` . On each call, a single cell gets set to a path, and the active cell's position gets updated.

First thing is to set the active cell to a path using the `set_cell` function.

    iterate_random_walk() {
        this.set_cell(this.x, this.y, this.path);

        switch (Math.floor(Math.random() * 4)) {
            case 0: this.y--; break;
            case 1: this.x++; break;
            case 2: this.y++; break;
            case 3: this.x--; break;
        }

        this.x = Math.max(1, Math.min(this.x, this.sizex - 2));
        this.y = Math.max(1, Math.min(this.y, this.sizey - 2));
    }

Remember that the `x` and `y` variables represent the active cell. Now that it has been set to a path, the active cell needs to change. As required in the algorithm, the next active cell must be a random neighbour of the current active cell. A switch statement based on a randomly generated number between 0 and 3 increments/ decrements the relevant axis. Each of the 4 directions corresponds to one of north, east, south or west.

Once the switch has been run, one of the `x` and `y` coordinates of the active cell will have changed. Because the direction is random, it is possible that the new active cell is already a path. This is fine, though, as it keeps the cave size random.

Our grid is finite, with a fixed width and height. As the active cell is traversing the grid on each iteration, we need to validate it is within the bounds of the grid. This is done by clamping the coordinates using the `min` and `max` functions. Most languages will have these functions readily available.

## Keeping the Cave Random

Throughout each call of the `iterate_random_walk` function, the data is never quality tested. The only validation is clamping the coordinates so that our array indexes dont overflow. This lack of quality assurance can result in two things:

* The next active cell is already a path. This is desirable because it keeps the size of the cave random and unpredictable.
* If the active cell is already at the edge of the grid, there is a 25% chance of the next coordinate being clamped and therefore not changing. This can cause the undesirable effect of having our path "stick" to an edge, like in *Figure 2*. To fix this, we could make sure to choose only valid directions in the switch statement.

{% include blog-figure.md figure=2 title="Cave Sticking to the Edge of a Grid" %}


The random walk algorithm is a very simple and easy technique to use. In reality, the caves it generates are not necessarily perfect for an actual game, because it's heavy reliance on random numbers can result in wierd looking worlds.

Personally, when I am making games that need to generate caves and dungeons, the random walk algorithm is the first one I implement, but for testing rather than an actual game feature.

## Further Reading

* The RogueBasin wiki has a page on [Random Walk Cave Generation](http://www.roguebasin.com/index.php?title=Random_Walk_Cave_Generation), which demonstrates similar ideas to this article.
* Mozilla web docs have a page describing [Tilemaps](https://developer.mozilla.org/en-US/docs/Games/Techniques/Tilemaps), for web development. Some of the concepts can be transferred to tilemaps in non-web environments.