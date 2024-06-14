package univ.iwa.controllers;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;
import univ.iwa.model.Person;

@RestController
public class PersonController {
    @PostMapping("persons")
    public String getPerson(@RequestBody Person p){
        return "Id : "+p.getId()+" Nom : "+p.getNom();
    }
}
