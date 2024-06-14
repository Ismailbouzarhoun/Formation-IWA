package univ.iwa.controller;

import java.util.List;
import java.util.Optional;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RestController;

import univ.iwa.model.Person;
import univ.iwa.repository.PersonRepository;
@RestController
public class PersonController {
	@Autowired PersonRepository personRepository;
	@PostMapping("persons")
	public Person postPerson(@RequestBody Person person) {
		return personRepository.save(person);
	}
	@GetMapping("persons")
	public List<Person> getAllPersons(){
		return personRepository.findAll();
	}
	@GetMapping("persons/{id}")
	public Optional<Person>getPersonById(@PathVariable Long id){
		return personRepository.findById(id);
	}
}
