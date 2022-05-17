/**
 * 
 */
export default function shuffle(array) {
    var i = array.length;
    var r;
    while (0 !== i) {
        r = Math.floor(Math.random() * i);
        i--;
        [array[i], array[r]] = [array[r], array[i]];
    }

    return array;
}