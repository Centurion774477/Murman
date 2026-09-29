# Murman

The reason I created Murman was because writing ideas is much more enjoyable in a document editor like the Notes app or Google Docs compared to Neovim or VS Code.

However, if you eventually move forwards on that project using your drafted ideas, you may end up copying and pasting some of your ideas into your README.md,
which will give you things like:

```coffeescript
x.style.display = ‘block’
```

Notice the curly quotes? Now imagine somebody comes along and discovers your project; they go to download it and copy one of your snippets from the README;
they paste it in and run it... and then it breaks because code is quite fragile and a simple curly quote in place of a straight quote will cause some serious problems.

# Run Murman

To run Murman, first go through the work to install it and get it on your machine; Git clone, etc.

Then, simply run `php murman.php <file_to_purify>` in your terminal -- make sure you are in the same directory as Murman.

If you wish, you could add it to your bin by making it executable and whatnot, but that's different for everybody so I can't give you a tutorial.

I hope you enjoy Murman. Cheers!
