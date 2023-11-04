package univ.iwa.controllers;
import org.springframework.web.bind.annotation.*;

@RestController
public class TestController {

    @GetMapping("message1")
    public String afficherBonjour(@RequestParam String prenom){
        return "Bonjour "+prenom;
    }

    @GetMapping("message2/{prenom}")
    public String afficherBonsoir(@PathVariable String prenom){
        return "Bonsoir "+prenom;
    }

}
