import initialise from '/js/initialise.js';
import Grid       from '/js/grid.js';
import shuffle    from '/js/shuffle.js';

initialise(class extends Grid {

    /**
     * 
     */
    constructor() {
        super(8);
        this.path = [191, 111, 101];
        this.wall = [41, 41, 41];
    }

    /**
     * 
     */
    * algorithm() {

        this.initialise();

        while (this.stack.length > 0) {
            this.evaluate_cell();
            yield;
        }
    }

    /**
     * 
     */
    initialise() {
        let x = Math.floor(this.sizex / 2);
        let y = Math.floor(this.sizey / 2);

        this.set_all_cells(this.wall);

        this.stack = [];
        this.stack.push({last_x: x, last_y: y, next_x: x, next_y: y});
    }

    /**
     * 
     */
    evaluate_cell() {
        let cell = this.stack.pop();

        let vald = this.is_valid(cell.next_x, cell.next_y);
        let type = this.get_cell(cell.next_x, cell.next_y);

        if (vald && type === this.wall) {
            this.draw_path(cell);
            this.add_cell_neighbours(cell);
        }
    }

    /**
     * 
     */
    add_cell_neighbours(cell) {
        let ns = this.get_random_neighbours(cell.next_x, cell.next_y);

        for (var i = 0; i < 4; i++) {
            this.stack.push({last_x: cell.next_x, last_y: cell.next_y, next_x: ns[i][0], next_y: ns[i][1]});
        }
    }

    /**
     * 
     */
    get_random_neighbours(x, y) {
        return shuffle([[x, y - 2], [x + 2, y], [x, y + 2], [x - 2, y]]);
    }

    /**
     * 
     */
    draw_path(cell) {
        let x1 = cell.last_x;
        let x2 = cell.next_x;
        let y1 = cell.last_y;
        let y2 = cell.next_y;

        for (var i = Math.min(x1, x2); i <= Math.max(x1, x2); i++) {
            for (var j = Math.min(y1, y2); j <= Math.max(y1, y2); j++) {
                this.set_cell(i, j, this.path);
            }
        }
    }
});