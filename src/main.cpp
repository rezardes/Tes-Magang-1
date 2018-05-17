#include <iostream>
using namespace std;

#define TILES '@'

int isDeretAritmatika(int i, int a, int b) {
    int value = (i-a);
    return (value%b==0) && (value>=0);
}

int isDoor(int i, int j, int n) {
    return (isDeretAritmatika(i, 0, 4) && i%2==0 && j==1) 
            || (isDeretAritmatika(i, 2, 4) && i%2==0 && j==n-2);
}

int isFloor(int i, int j, int n) {
    return (i%2==1 && j>=1 && j<n-1);
}

int isNotWall(int i, int j, int n) {
    return (isDoor(i,j,n) || isFloor(i,j,n));
}

int main () {

    int n;
    char tile = TILES;

    cin >> n;

    for(int i=0;i<n;i++) {
        for(int j=0;j<n;j++) {

            if (isNotWall(i, j, n)) {
                cout << " ";
            } else {
                cout << tile;
            }
        }
        cout << endl;
    }

    return 0;
}